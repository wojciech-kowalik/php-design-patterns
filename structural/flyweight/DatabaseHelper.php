<?php

namespace DesignPatterns\Structural\Flyweight;

/**
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Flyweight
 */
class DatabaseHelper
{
    public $db;

    public function __construct()
    {
        $this->db = new CatDatabase();
    }

    /**
     * @param array $query
     * @return void
     */
    public function findBy(array $query)
    {
        $cat = $this->db->findCat($query);
        if ($cat) {
            $cat->render();
        }
    }

    /**
     * @param string $file
     * @return void
     */
    public function loadData($file)
    {
        $handle  = fopen(__DIR__ . "/" . $file, "r");
        $row     = 0;
        $columns = [];

        while (($data = fgetcsv($handle)) !== false) {
            if (0 == $row) {
                for ($c = 0; $c < count($data); $c++) {
                    $columnIndex         = $c;
                    $columnKey           = strtolower($data[$c]);
                    $columns[$columnKey] = $columnIndex;
                }
                $row++;
                continue;
            }

            $this->db->addCat(
                $data[$columns['name']],
                $data[$columns['age']],
                $data[$columns['owner']],
                $data[$columns['breed']],
                $data[$columns['image']],
                $data[$columns['color']],
                $data[$columns['texture']],
                $data[$columns['fur']],
                $data[$columns['size']]
            );
            $row++;
        }
        fclose($handle);

    }

}
