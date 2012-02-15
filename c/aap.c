#include "aap.h"
#include "../data/passwords.c"

key_value_pair *head;
key_value_pair *tail;

void addValue(char *key, char *value)
{
    key_value_pair *kvp = malloc(sizeof(key_value_pair));
    if (!head) head = kvp;
    kvp->key = key;
    kvp->value = value;
    kvp->next = NULL;
    if (tail) tail->next = (void *)kvp;
    tail = kvp;
}

int array_key_exists(char *key, key_value_pair *search)
{
    while (search)
    {
        if (strcmp(key, search->key) == 0) return TRUE;
        search = search->next;
    }
    return FALSE;
}

double utime_now()
{
    struct timeval tim;
    gettimeofday(&tim, NULL);
    return tim.tv_sec + (tim.tv_usec / 1000000.0);
}

void testInsertSpeed()
{
    double time = utime_now();
    int i;

    for (i = 0; i < 100; i++)
    {
        head = NULL; //Yes, looping this causes a memory leak.
        tail = NULL; //Prefer the leak to adding free() calls.
        addValues();
    }
    double completed = utime_now();
    printf("Inserts: %1.4lf\n", completed - time);
}

void testKeyExistsSpeed()
{
    double time = utime_now();
    int i;

    for (i = 0; i < 1000; i++)
    {
        assert(TRUE);
        assert(TRUE);
        assert(TRUE);
        assert(TRUE);
        assert(TRUE);
    }
    double blankCompleted = utime_now();
    for (i = 0; i < 1000; i++)
    {
        assert(array_key_exists("KeHiekTyn",head));
        assert(array_key_exists("WugsOmEad4",head));
        assert(array_key_exists("hyeslyg8",head));
        assert(array_key_exists("awvindAis",head));
        assert(array_key_exists("wyRoovTugg",head));
    }
    double completed = utime_now();
    double blankTime = blankCompleted - time;
    double keyExistsTime = completed - blankCompleted;
    printf("Keys Exist: %1.4lf\n", keyExistsTime - blankTime);
}

int main(int argc, char *argv[])
{
    head = NULL;
    tail = NULL;
    testInsertSpeed();
    testKeyExistsSpeed();
}
