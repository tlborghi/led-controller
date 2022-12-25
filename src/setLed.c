#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int main(int argc, char *argv[]) {

    // creating file pointer to work with files
    FILE *fptr;

    char blueFile[]  = "/sys/class/leds/librecomputer:blue/brightness";
    char greenFile[] = "/sys/class/leds/librecomputer:system-status/brightness";
    int  status = 1;
    char* file;
    char* value;
    if (argc != 3) {
        printf("invalid argument list\n");
        exit(1);
    }
    if (!strcmp(argv[1], "blue")) {
        file = blueFile;
    } else if (!strcmp(argv[1], "green")) {
        file = greenFile;
    }
    if (!strcmp(argv[2], "0")) {
        value = "0";
    } else if (!strcmp(argv[2], "1")) {
        value = "1";
    }
    if (file && value) {
        // opening file in writing mode
        fptr = fopen(file, "w");
        if (fptr) {
            fprintf(fptr, "%s", value);
            status = 0;
            fclose(fptr);
        }
    }
    return status;
}
