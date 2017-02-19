import sys

l = open(sys.argv[1], 'r')

lines_seen = set()
duplicates = set()

f = open('test.txt', 'w')

word = l.readline()

while word:
	word = word.rstrip()
	c = word.split(';')
	if c[0] not in lines_seen:
		lines_seen.add(c[0])
	else:
		duplicates.add(word)
	word = l.readline()

for word in duplicates:
	f.write(word+'\n')

l.close()
f.close()