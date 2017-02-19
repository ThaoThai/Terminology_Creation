import sys

def check(word, listfile):
	for line in listfile:
		line.rstrip()
		li = line.split(';')
		if li[0]==word:
			return False
	return True



w = open(sys.argv[1], "r")
lines = w.readlines()

f = open('en.txt', "r")
temp = open('temp.txt', 'w')

l = f.readline()

while l:
	c = l.rstrip()
	if check(c, lines):
		temp.write(c+';'+c+'\n')
	l = f.readline()

f.close()
w.close()	