#include <ESP8266WiFi.h>
#include <WiFiClient.h>

const char* ssid = "realme3";
const char* password = "Password";
const char* host = "192.168.1.2";  // IP Address of your server
const int port = 80;  // Port on which your server is running

WiFiClient client;

void setup() {
  Serial.begin(9600);
  delay(10);

  Serial.println();
  Serial.println("Connecting to WiFi");

  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
}

void loop() {
  if (!client.connected()) {
    if (!client.connect(host, port)) {
      Serial.println("Connection to server failed.");
      delay(5000);
      return;
    }
  }

  // Example sensor readings
  float distance1 = 10.5;
  float distance2 = 20.3;
  float distance3 = 15.7;
  float weight = 5.8;

  // Create data string
  String data = "distance1=" + String(distance1) +
                "&distance2=" + String(distance2) +
                "&distance3=" + String(distance3) +
                "&weight=" + String(weight);

  // Send data to server
  sendDataToServer(data);

  // Wait for the server's response
  while (client.connected() || client.available()) {
    if (client.available()) {
      String response = client.readStringUntil('\r');
      Serial.print("Server response: ");
      Serial.println(response);
      break;
    }
  }

  // Close the connection to the server
  client.stop();

  delay(10000);  // Adjust delay as needed
}

void sendDataToServer(String data) {
  if (client.connected()) {
    client.print("GET /pblwctt2/submit_data.php?");
    client.print(data);
    client.println(" HTTP/1.1");
    client.print("Host: ");
    client.println(host);
    client.println("Connection: close");
    client.println();
  }
}