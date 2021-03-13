# Nama : Satriya Adhitama
# Bootcamp : Fullstack Developer

def camelCaseConverter(text):
    if text.isalpha():
        i = 0
        new_text = ""
        jumlah_kata = 1
        while i < len(text):
            if text[0].isupper() or (text[i].isupper() and text[i+1].isupper()):
                print("Penulisan input harus camel case")
                break
            else:
                if text[i].islower():
                    new_text += text[i]
                    i += 1
                else:
                    new_text += ", " + text[i].lower()
                    jumlah_kata += 1
                    i += 1
        print("Kata sebelum dipisah : " + text)
        print("Jumlah kata          : " + str(jumlah_kata))
        print("Kata yang tersedia   : " + new_text)
    else:
        print("Input hanya boleh berupa huruf")


def main():
    text = "iniAdalahPenulisanCamelCase"
    camelCaseConverter(text)
    

main()