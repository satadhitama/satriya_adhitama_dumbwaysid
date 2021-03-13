# Nama : Satriya Adhitama
# Bootcamp : Fullstack Developer

# Fungsi untuk mengurutkan kata
def urut_kata(kalimat):
    list_kata = kalimat.split(" ")
    nomor_kata = 1
    kalimat_urut = ""
    if kalimat != "":
        while nomor_kata <= len(list_kata):
            for kata in list_kata:
                for huruf in kata:
                    if huruf.isdigit():
                        if int(huruf) == nomor_kata:
                            kalimat_urut += kata + " "
            nomor_kata += 1
    return kalimat_urut


# Fungsi untuk mengecek apakah kalimat telah sesuai dengan aturan
def cek_kata(kalimat):
    list_kata = kalimat.split(" ")
    is_valid = True
    list_num = []
    for kata in list_kata:
        if kata.isalnum():
            for huruf in kata:
                if huruf.isdigit():
                    if 0 < int(huruf) < 9:
                        list_num.append(int(huruf))
                    else:
                        is_valid = False
                        break
        else:
            is_valid = False
            break
    # Checking if there's some number in list of num
    if len(list_num) > 1:
        # Sorting the list of number
        for i in range(len(list_num)-1):
            for j in range(0, len(list_num)-i-1):
                if list_num[j] > list_num[j + 1]:
                    placeholder = list_num[j]
                    list_num[j] = list_num[j+1]
                    list_num[j+1] = placeholder
        # Checking if the list of num
        index = 0
        while index < len(list_num):
            if index == len(list_num) - 1:
                break
            elif list_num[index] + 1 != list_num[index+1]:
                is_valid = False
                break
            index += 1
    else:
        is_valid = False
    return is_valid


def main():
    kalimat = input("Masukkan Kalimat Anda : ")
    if kalimat == "":
        print("Ups, sepertinya Anda belum mengisikan kalimat!")
    else:
        if cek_kata(kalimat) is True:
            kalimat_urut = urut_kata(kalimat)
            print("Kalimat Anda sesudah diurutkan : " + kalimat_urut)
        else:
            print("Ups, input yang Anda masukkan invalid!")


main()
