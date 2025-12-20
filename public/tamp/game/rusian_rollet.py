import random
import os

FILE_TARUHAN = "nyawa.html"
SELONGSONG = 6
ronde = 1

print("🔫 RUSSIAN ROULETTE - MULTI PLAYER")
print("Main bergiliran, pilih angka 0-5")
print("Game akan berhenti kalau ADA yang kena 💀\n")

while True:
    print(f"🎯 Ronde ke-{ronde}")

    # input pemain
    try:
        taruhan = int(input("Masukkan angka taruhan (0-5): "))
    except ValueError:
        print("❌ Input harus angka!\n")
        continue

    if taruhan < 0 or taruhan > 5:
        print("❌ Angka harus 0-5!\n")
        continue

    peluru = random.randint(0, SELONGSONG - 1)

    print("🎲 Mengacak peluru...")

    if taruhan == peluru:
        print("\n💥 DORRRR!!! KENA PELURU 💀")
        print(f"💣 Peluru ada di selongsong nomor: {peluru}")

        if os.path.exists(FILE_TARUHAN):
            os.remove(FILE_TARUHAN)
            print("📁 File taruhan DIHAPUS!")
        else:
            print("📁 File taruhan tidak ditemukan.")

        print("\n🎮 GAME OVER")
        break
    else:
        print("😌 Klik... peluru kosong")
        print(f"(Peluru ada di selongsong nomor: {peluru})\n")

    ronde += 1
