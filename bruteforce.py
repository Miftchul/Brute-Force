import mysql.connector
import itertools
import time

# Koneksi ke database MySQL
db = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="test_login"
)

cursor = db.cursor()

# Mengambil username dan password dari database
cursor.execute("SELECT username, password FROM users WHERE username='AM2231'")
result = cursor.fetchone()

# Target password dari database
target_username = result[0]
target_password = result[1]

# Karakter yang akan ditebak
# characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()?~`'
characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'

# Fungsi brute-force
def brute_force():
    attempts = 0
    start_time = time.time()
    
    # Kombinasi semua kemungkinan password dengan panjang 4 karakter
    for guess in itertools.product(characters, repeat=4):
        guessed_password = ''.join(guess)
        attempts += 1
        print(f"Percobaan ke-{attempts}: {guessed_password}")
        
        # Cek apakah tebakan benar
        if guessed_password == target_password:
            end_time = time.time()
            print(f"Password ditemukan: {guessed_password} setelah {attempts} percobaan!")
            print(f"Waktu yang dibutuhkan: {end_time - start_time:.2f} detik")
            break

# Memulai brute-force
brute_force()
