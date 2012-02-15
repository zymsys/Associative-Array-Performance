#include <stdlib.h>
#include <stdio.h>
#include <sys/time.h>
#include <string.h>
#include <assert.h>

#ifndef TRUE
#define TRUE (1)
#endif
#ifndef FALSE
#define FALSE (0)
#endif

typedef struct key_value_pair {
        char *key;
        char *value;
        void *next;
} key_value_pair;

void addValue(char *key, char *value);