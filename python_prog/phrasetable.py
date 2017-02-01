import math
import string


with open('/Users/thaothai/Desktop/Terminology_Creation/results/ga/lm/train/model/phrase-table') as table :
    Outfile = open('/Users/thaothai/Desktop/Terminology_Creation/results/ga/ga-phrase', 'w')
    lines = table.read().splitlines()
    for line in lines:
        phrase = line.split("|||")
        Scores = [float (i) for i in phrase[2].lstrip().split()]
        AvgScore = sum(Scores)/len(Scores)
        if AvgScore < 0.5:
            continue
        Source = phrase[0].split()
        print(Source)
        Target = phrase[1].split()
        print(Target)
        Align = phrase[3].split()
        print(Align)
        stemp = -1;
        ttemp = -1;
        sword = ""
        tword = ""
        for i in Align:
                if (stemp == int(i[0]) and ttemp != int(i[2])) :
                    stemp = int(i[0])
                    ttemp = int(i[2])
                    sword += " " + Target[ttemp]
                    if (i == Align[-1]) :
                        Outfile.write(sword + ";" + tword + "\n")
                elif (ttemp == int(i[2]) and stemp != int(i[0])) :
                    stemp = int(i[0])
                    ttemp = int(i[2])
                    tword += " " + Source[stemp]
                    if (i == Align[-1]) :
                        Outfile.write(sword + ";" + tword + "\n")
                else:
                    stemp = int(i[0])
                    ttemp = int(i[2])
                    if stemp == 0 or ttemp == 0:
                        tword = Source[stemp]
                        sword = Target[ttemp]
                    elif i == Align[-1]:
                        print(sword + ";" + tword)
                        tword= Source[stemp]
                        sword= Target[ttemp]
                        Outfile.write(sword + ";" + tword + "\n")
                    else:
                        Outfile.write(sword + ";" + tword + "\n")
                        tword= Source[stemp]
                        sword= Target[ttemp]
                #print (sword + " ; " + tword)
                    #Outfile.write(Source[Align[0]] +" " + Target[Align[2]])

    Outfile.close()




