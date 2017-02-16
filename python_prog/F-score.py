from collections import defaultdict
import math

pmi = defaultdict(list)
mose = defaultdict(list)
phrases = defaultdict(list)
namelist = []

with open('/Users/thaothai/Desktop/Terminology_Creation/results/recall') as recall, open('/Users/thaothai/Desktop/Terminology_Creation/results/precision') as precision:
    name = 0
    pminfo = 4
    moses = 5
    phrase = 6
    lines = recall.read().splitlines()
    plines = precision.read().splitlines()

    while name < len(lines) -8:
        namelist.append(lines[name])
        name += 8

    for key in namelist:
        k = 1
        linep = lines[pminfo].split("    ")
        linem = lines[moses].split("    ")
        lineh = lines[phrase].split("    ")

        plinep = plines[pminfo].split("    ")
        plinem = plines[moses].split("    ")
        plineh = plines[phrase].split("    ")

        while k < 6:
            pmi_tup = (float(linep[k]),float(plinep[k]))
            moses_tup = (float(linem[k]), float(plinem[k]))
            phrase_tup = (float(lineh[k]), float(plineh[k]))
            pmi[key].append(pmi_tup)
            mose[key].append(moses_tup)
            phrases[key].append(phrase_tup)
            k+=1
        pminfo += 8
        phrase += 8
        moses += 8
recall.close()
precision.close()


print("========PMI========" + "\n")
for key in pmi:
    cutoff =0.60
    maxscore = 0
    for item in pmi[key]:
        if item[0] == 0 or item[1] == 0:
            fscore = 0
        else:
            fscore = 1.25*((item[0] * item[1])/(item[0] + (0.25*item[1])))
        if fscore > maxscore:
            maxscore = fscore
            maxcutoff = cutoff
        # print key + " || " + str(cutoff) + " || " + str(fscore)
        cutoff += 0.05
    print key + " || " + str(maxcutoff) + " || " + str(maxscore)


print("\n" + "========MOSES========" + "\n")
for key in mose:
    cutoff =0.60
    maxscore = 0
    for item in mose[key]:
        if item[0] == 0 or item[1] == 0:
            fscore = 0
        else:
            fscore = 1.25*((item[0] * item[1])/(item[0] + (0.25*item[1])))
        if fscore > maxscore:
            maxscore = fscore
            maxcutoff = cutoff
        # print key + " || " + str(cutoff) + " || " + str(fscore)
        cutoff += 0.05
    print key + " || " + str(maxcutoff) + " || " + str(maxscore)

print("\n" + "========PHRASE========" + "\n")
for key in phrases:
    cutoff =0.60
    maxscore = 0
    for item in phrases[key]:
        if item[0] == 0 or item[1] == 0:
            fscore = 0
        else:
            fscore = 1.25*((item[0] * item[1])/(item[0] + (0.25*item[1])))
        if fscore > maxscore:
            maxscore = fscore
            maxcutoff = cutoff
        # print key + " || " + str(cutoff) + " || " + str(fscore)
        cutoff += 0.05
    print key + " || " + str(maxcutoff) + " || " + str(maxscore)
