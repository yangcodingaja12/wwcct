from locust import HttpUser, between, task

class MoodleUser(HttpUser):
    wait_time = between(5, 15)  # Waktu tunggu antara setiap aksi

    
    @task
    def ceklogin(self):
        self.client.post("http://localhost/pblwctt2/", {
            "username": "andri",  # Ganti dengan nama pengguna Anda
            "password": "123"  # Ganti dengan kata sandi Anda
        })
    
    @task
    def view_dashboard(self):
        self.client.get("http://localhost/pblwctt2/Dashboard/dashboard")
        
    @task
    def input1(self):
        # Contoh tugas untuk menguji input1
        self.client.post("http://localhost/pblwctt2/Proses/input1", {
            "input1": "value1",
        })

    @task
    def test_location(self):
        # Contoh tugas untuk menguji letak
        self.client.post("http://localhost/pblwctt2/Proses/letak", {
        })
        
    @task
    def input1(self):
        # Contoh tugas untuk menguji input1
        self.client.post("http://localhost/pblwctt2/Proses/input2", {
            "input2": "value2",
        })
    # @task
    # def view_course(self):
    #     self.client.get("http://10.170.14.95/moodle/my/courses.php")  # Ganti URL dengan URL kursus Moodle yang ingin Anda uji


    # @task
    # def view_profile(self):
    #     self.client.get("http://10.170.14.95/moodle/user/profile.php")  # Ganti URL dengan URL profil pengguna yang ingin Anda uji

    # @task
    # def enroll_course(self):
    #     self.client.post("http://10.170.14.95/moodle/course/enrol.php?id=7",{
    #         "enrol": "pakswono"
    #     })
        
    # @task
    # def upload_users(self):
    #     self.client.get("http://10.170.14.95/moodle/admin/tool/uploaduser/index.php")
    
    # @task
    # def upload_courses(self):
    #     self.client.get("http://10.170.14.95/moodle/admin/tool/uploadcourse/index.php")