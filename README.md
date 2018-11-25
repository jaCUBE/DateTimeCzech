# DateTimeCzech
Malá knihovna pro práci s datumy v českém prostředí.

- Umožňuje snadno používat české názvy měsíců a dnů.
- České názvy měsíců/dnů zvládá i skloňovat.
- Podporuje české státní svátky.

# Instalace
Instalace knihovny je nejjednodušší přes Composer:
```
composer require datetimeczech/datetimeczech
```


# Funkce
Knihovna je postavená na nativním objektem v PHP, `DateTime`,
můžete proto používat vše, co vám tato třída umožňuje.


## Dny v týdnu
- `l[cz]` - Celý český název dne v týdnu
- `D[cz]` - Zkrácený český název dne v týdnu
```
$date = new DateTimeCzech('2018-11-21');

$date->format('l[cz]'); // "středa"
$date->format('j.n.Y, l[cz]'); // "21.11.2018, středa"

$date->format('D[cz]'); // "st"
```

## Měsíce
- `F[cz]` - Celý český název měsíce
- `M[cz]` - Zkrácený český název měsíce
```
$date = new DateTimeCzech('2018-12-01');

$date->format('F[cz]'); // "prosinec"
$date->format('k j. F[cz] Y', 3); // "k 1. prosinci 2018"

$date->format('M[cz]'); // "pro"
```

## Státní svátky, víkendy a pracovní dny
Státní svátky:
```
$date = new DateTimeCzech('2018-04-30');
$date->isPublicHoliday(); // false

$date = new DateTimeCzech('2018-05-01');
$date->isPublicHoliday(); // true

$date = new DateTimeCzech('2018-05-01');
$date->getPublicHolidayName(); // "Svátek práce"
```

Víkendy:
```
$date = new DateTimeCzech('2018-11-24');
$date->isWeekend(); // true
```

Pracovní dny (bez víkendů a státních svátků):
```
$date = new DateTimeCzech('2018-12-24');
$date->isWorkingDay(); // false

$date = new DateTimeCzech('2018-12-28');
$date->isWorkingDay(); // true
```

## Plány do budoucna
Pro další vývoj plánuji implementovat:
- Zacházení s časem (např. generování "před 3 hodinami")
- Výpočet pracovních dní v rozsahu datumů (či pro měsíc nebo rok)
- Podpora Velikonoc před rokem 1970 a po roce 2037

## Kontakt
Jakub Rychecký <jakub@rychecky.cz>