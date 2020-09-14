<?php

namespace App\Config;

class Install
{
    public function Chek_tables($connection)
    {
        $table = 'users';
        $sql = "SELECT 1 FROM `" . $table . "` LIMIT 1";
        $stmt = $connection->query($sql);

        if (!$stmt) {
            $sql = "CREATE TABLE `users` (
            `id` int(11) NOT NULL,
            `login` varchar(30) CHARACTER SET utf8 NOT NULL,
            `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
            `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
          INSERT INTO `users` (`id`, `login`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin');

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
  ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
COMMIT;
          ";
            $create = $connection->query($sql);
        }

        $table = 'news';
        $sql = "SELECT 1 FROM `" . $table . "` LIMIT 1";
        $stmt = $connection->query($sql);

        if ($stmt) {
            return TRUE;
        } else
            $sql = "CREATE TABLE `news` (
                `id` int(11) NOT NULL,
                `headline` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
                `preview` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
                `text` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
                `date` date NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

              INSERT INTO `news` (`id`, `headline`, `preview`, `text`, `date`) VALUES
(2, 'Новость №1', 'что-то случилось', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text', '2020-09-10'),
(5, 'Новость №2', 'что-то случилось', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text', '2020-09-10'),
(7, 'Новость №3', 'что-то случилось', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text', '2020-09-09'),
(9, 'Новость №4', 'что-то случилось', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text', '2020-09-03'),
(10, 'Новость №5', 'что-то случилось', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text', '2020-09-01'),
(74, 'Новость №6', 'что-то случилось', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text', '2020-09-10'),
(75, 'Новость №7', 'что-то случилось', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text', '2020-09-10'),
(77, 'Новость №8', 'что-то случилось', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text', '2020-09-10'),
(78, 'Новость №9', 'что-то случилось', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text', '2020-09-10'),
(79, 'Новость №10', 'что-то случилось', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text', '2020-09-10'),
(80, 'Новость №11', 'что-то случилось', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text', '2020-09-10'),
(81, 'Новость №12', 'что-то случилось', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text', '2020-09-10'),
(82, 'Новость №13', 'что-то случилось', 'text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text', '2020-09-10');


ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);
  ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
COMMIT;
          ";
        $create = $connection->query($sql);
    }
}
