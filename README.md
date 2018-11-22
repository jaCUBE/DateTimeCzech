# DateTimeCzech
Malá knihovna pro práci s datumy v českém prostředí.

- Umožňuje snadno používat české názvy měsíců a dnů včetně skloňování.

# Instalace
Instalace knihovny je nejjednodušší přes váš Composer:
-- TODO --



# Funkce
Knihovna je postavená na nativním objektem v PHP, `DateTime`,
můžete proto používat vše, co vám tato třída umožňuje.



## Dny v týdnu
- `l[cz]` - Celý český název dne v týdnu
- `D[cz]` - Zkrácený český název dne v týdnu
```
$date = new DateTimeCzech('2018-11-21');

$date->format('l[cz]'); // Středa
$date->format('j.n.Y, l[cz]'); // 21.11.2018, středa
```