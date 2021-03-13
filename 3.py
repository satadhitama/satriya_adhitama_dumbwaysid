# Nama : Satriya Adhitama
# Bootcamp : Fullstack Developer


def printFlag():
    string = ['D','U','M','B','W','A','Y','S','I','D']
    flag_line = 9
    flag_text_line = flag_line // 2
    for i in range(0, flag_line):
        for j in range(0, len(string)):
            if i == flag_text_line:
                print("\t" + string[j], end='')
            elif i == flag_text_line - 1 or i == flag_text_line + 1:
                if j == 0 or j % 2 == 0:
                    print('\t*',end='')
                else:
                    print('\t=', end='')
            else:
                if j == 0 or j % 2 == 0:
                    print('\t=',end='')
                else:
                    print('\t*', end='')
        print()
    print(flag_text_line)


def main():
    printFlag()


main()