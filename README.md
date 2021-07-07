# Dummy Operation

Execute dummy operations

## Up
```bash
$ docker-compose up -d
```

## Sum
```bash
$ docker exec -it dummy-operation ./dop -o Sum -n 6 -n 4
```

## Subtraction
```bash
$ docker exec -it dummy-operation ./dop -o Subtraction -n 14 -n 4
```

## Division

```bash
$ docker exec -it dummy-operation ./dop -o Division -n 25 -n 5
```

## Rest

```bash
$ docker exec -it dummy-operation ./dop -o Rest -n 25 -n 5
```

## Multiplication
```bash
$ docker exec -it dummy-operation ./dop -o Multiplication -n 5 -n 5
```

## Even or Odd
```bash
$ docker exec -it dummy-operation ./dop -o EvenOrOdd -n 5
```

## Fibonacci
```bash
$ docker exec -it dummy-operation ./dop -o Fibonacci -n 5
```

## Prime
```bash
$ docker exec -it dummy-operation ./dop -o Prime -n 5
```
