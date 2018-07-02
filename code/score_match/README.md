Задача:
На основе таблицы выступления сборных на ЧМ, нужно рассчитатьусловную мощность атаки и обороны каждой команды. Как именнорассчитывать мощность – решать вам.Таблица с данными в документе data.php.
Необходимо создать функцию match($c1, $c2).
• Входные параметры: $c1, $c2 – integer, порядковый номер команды из исходного файла (нумерация с 0);
• Выходные параметры: массив из 2х элементов. 0й индекс - сколько 1я команда забила голов 2й команде, 1й индекс - сколько 2я командазабила голов первой команде. Например:function match($c1, $c2){return array(2, 1); }
Счет матча рассчитывается рандомом с заданной вероятностью.
• Вероятность забивания голов определяется мощностью команд (чем сильнее команда, тем выше вероятность, что она забьет больше головсопернику и ниже вероятность пропуска голов в свои ворота). • Рандом – ключевой фактор при определении счета. Именно благодаря рандому (случайностям) победа не гарантирована даже самой сильнойкоманде (от игры к игре между теми же командами результаты могутбыть разными).
Вывести процент вероятности исхода матча при рандомном количестве игр.
Вывести вероятности исхода счета матча при следующей игре.
Вывести количество побед и ничьих у каждой из команд.