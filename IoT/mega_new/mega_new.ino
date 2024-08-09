#include "HX711.h"
#include <NewPing.h>

#define DOUT  4
#define CLK   5

#define TRIG_PIN_1  8   // D1
#define ECHO_PIN_1  9   // D2
#define TRIG_PIN_2  10  // D6
#define ECHO_PIN_2  11  // D7
#define TRIG_PIN_3  12  // Pin Contoh
#define ECHO_PIN_3  13  // Pin Contoh

HX711 scale;

// Berat yang diketahui dalam kg (sesuaikan dengan berat yang digunakan untuk kalibrasi)
const float known_weight = 0.0;  // Contoh: menggunakan berat 1 kg

void setup() {
  Serial.begin(9600);
  Serial1.begin(9600);
  
  // Inisialisasi HX711
  scale.begin(DOUT, CLK);
  scale.set_scale();

  // Kalibrasi timbangan menggunakan berat yang diketahui
  Serial.println("Letakkan berat yang diketahui di atas timbangan...");
  delay(5000);  // Delay untuk menstabilkan pengukuran berat
  scale.set_scale(calibration_factor(known_weight));  // Kalibrasi menggunakan berat yang diketahui
  
  // Tar ulang timbangan setelah kalibrasi
  scale.tare();

  // Inisialisasi pin sensor ultrasonik
  pinMode(TRIG_PIN_1, OUTPUT);
  pinMode(ECHO_PIN_1, INPUT);
  pinMode(TRIG_PIN_2, OUTPUT);
  pinMode(ECHO_PIN_2, INPUT);
  pinMode(TRIG_PIN_3, OUTPUT);
  pinMode(ECHO_PIN_3, INPUT);

  // Cetak faktor nol setelah tar ulang
  long zero_factor = scale.read_average();
  Serial.print("Faktor nol setelah tar ulang: ");
  Serial.println(zero_factor);
}

void loop() {
  // Baca jarak dari sensor ultrasonik
  float distance1 = getDistance(TRIG_PIN_1, ECHO_PIN_1);
  float distance2 = getDistance(TRIG_PIN_2, ECHO_PIN_2);
  float distance3 = getDistance(TRIG_PIN_3, ECHO_PIN_3);

  // Baca berat dari load cell
  float units = scale.get_units(10);  // Baca rata-rata dari 10 pembacaan untuk hasil yang lebih stabil
  if (units < 0) {
    units = 0.0;
  }

  // Cetak data ke monitor serial
  String data = "#" + String(distance1) + "cm," + String(distance2) + "cm," + String(distance3) + "cm," + String(units) + "kg";
  Serial.println(data);
  Serial1.println(data);

  delay(1000); // Delay antara pembacaan
}

float getDistance(int trigPin, int echoPin) {
  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  
  long duration = pulseIn(echoPin, HIGH);
  float distance = duration / 29.1 / 2.0;
  if (distance > 100) {
    distance = 100.0;
  }
  return distance;
}

// Fungsi untuk menghitung faktor kalibrasi berdasarkan berat yang diketahui
float calibration_factor(float known_weight_kg) {
  float raw_units = scale.get_units(10);  // Baca unit mentah
  float calibration_factor = known_weight_kg / raw_units;
  return calibration_factor;
}