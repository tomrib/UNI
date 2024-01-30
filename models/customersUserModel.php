<?php
require_once "database.php";
class customersUser
{
    public $db = NULL;
    public int $id = 0;
    public string $startDatePlanned = "";
    public string $endDatePlanned = "";
    public string $startDateReal = "";
    public string $endDateReal = "";
    public int $id_customers = 0;
    public int  $id_dates = 0;
    public int $id_users = 0;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAddressCustomer()
    {
        $query = 'SELECT jg7b_customers.id, `name`
              FROM jg7b_customersusers
              INNER JOIN jg7b_customers ON jg7b_customersusers.id_customers = jg7b_customers.id
              WHERE jg7b_customersusers.id_users = :id_users AND jg7b_customersusers.id_dates = :id_dates;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id_users', $this->id_users, PDO::PARAM_STR);
        $request->bindValue(':id_dates', $this->id_dates, PDO::PARAM_STR);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateDateReal($column)
    {
        $query = 'UPDATE jg7b_customersusers
    SET ' . $column . ' = TIME(NOW())
    WHERE id_users = :id_users AND id_customers = :id_customers AND id_dates = :id_dates;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id_users', $this->id_users, PDO::PARAM_STR);
        $request->bindValue(':id_dates', $this->id_dates, PDO::PARAM_STR);
        $request->bindValue(':id_customers', $this->id_customers, PDO::PARAM_STR);
        return $request->execute();
    }

    /** 
     * Fonction permettant la recherche de planning en fonction de dates, de l'utilisateur, et du client.
     * 
     * @param string|array|null $dates La ou les dates voulues, au format ANNÉE-MOIS-JOUR. Si le paramètre est null, ou que la liste est nulle, la fonction retournera tous les rendez-vous sans limite.
     * @param int|null $userId Identifiant de l'utilisateur. Si l'id est nul, la fonction retourna les rendez-vous de tout le monde.
     * @param int|null $customerId Identifiant du client. Si l'id est nul, la fonction retourna les rendez-vous sans distinction de client.
     * 
     * @return array Un tableau représentant le planning
     */
    public function getPlanningEntries(string|array|null $dates = null, int|null $userId = null, int|null $customerId = null): array {
        $request = $this->buildPlanningSQLRequest($dates, $userId, $customerId);
        
        $statement = $this->db->prepare($request);
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        var_dump($result);

        return [];
    }

    /**
     * Fonction enfant facilitant la création de la requête SQL de getPlanningEntries().
     * 
     * @param string|array|null $dates Voir getPlanningEntries()
     * @param int|null $userId Voir getPlanningEntries()
     * @param int|null $customerId Voir getPlanningEntries()
     * 
     * @return array Une requête SQL en fonction des paramètres donnés
     */
    private function buildPlanningSQLRequest(string|array|null $dates = null, int|null $userId = null, int|null $customerId = null): string {
        // Requête de base
        $request = 'SELECT jg7b_customersusers.startDatePlanned,
                            jg7b_customersusers.endDatePlanned,
                            jg7b_customersusers.startDateReal,
                            jg7b_customersusers.endDateReal,
                            jg7b_dates.date,
                            jg7b_customers.name,
                            jg7b_customers.address,
                            jg7b_customers.phone,
                            jg7b_customers.email,
                            jg7b_users.lastname,
                            jg7b_users.firstname
                    
                    FROM jg7b_customersusers

                    JOIN jg7b_dates ON jg7b_dates.id = jg7b_customersusers.id_dates
                    JOIN jg7b_customers ON jg7b_customers.id = jg7b_customersusers.id_customers
                    JOIN jg7b_users ON jg7b_users.id = jg7b_customersusers.id_users';

        // Si tous les paramètres sont nuls ont retourna la requête telle quelle
        if ($dates == null && $userId == null && $customerId == null) {
            return $request . ';';
        }

        // Sinon, on continue en commencant par ajouter WHERE
        $request .= ' WHERE ';

        // Ces variables sont là pour déterminer quand placer AND dans la clause WHERE de la requête
        $datesPlaced = false;
        $userPlaced = false;

        // Si la date n'est pas nulle et qu'elle n'est pas nulle, on ajoute la ou les dates à la requête SQL
        if ($dates != null) {
            if (!empty($dates)) {

                // Si il y a plusieurs dates (donc si c'est un tableau), on les encapsule entre parenthèse pour préciser à la base de données que les dates ne représentent qu'une seule condition dans la clause WHERE
                if (is_array($dates)) {
                    $request .= '(';

                    // Cette boucle s'occupe de placer les dates dans la requête, et de placer le mot clé "OR" entre les dates
                    foreach ($dates as $i => $date) {
                        if ($i != 0)
                            $request .= ' OR ';

                        // Étant donné que les dates données par le controller du planning sont en réalité des tableaux associatif et pas juste des tableaux de chaines de caractère, la partie suivante vérifie le cas de figure et si c'est le cas, ira prendre le 'sqlDate' des dates données.
                        // Si la date donnée est en réalité un tableau, et que dans ce tableau il existe une clé 'sqlDate', on utilisera cette valeur à la place
                        if (is_array($date)) {
                            if (array_key_exists('sqlDate', $date)) {
                                $date = $date['sqlDate'];
                            }
                        }

                        $request .= 'jg7b_dates.date = "' . $date . '"';
                    }

                    $request .= ')';
                } else {
                    // Sinon, on place juste la date seule
                    $request .= 'jg7b_dates.date = ' . $dates . '';
                }

                // On indique que des dates ont été placé
                $datesPlaced = true;
            }
        }

        // Si un identifiant d'utilisateur est donné 
        if ($userId != null) {
            // Si des dates ont été placées avant, on ajoute AND à la clause WHERE
            if ($datesPlaced) 
                $request .= ' AND ';

            $request .= 'jg7b_customersusers.id_users = ' . $userId;

            // On indique qu'un utilisateur a été placé
            $userPlaced = true;
        }

        // Même principe que plus haut, si un identifiant de client a été donné
        if ($customerId != null) {
            // Si un utilisateur ou les dates ont été placé avant, on ajoute AND à la clause WHERE
            if ($userPlaced || $datesPlaced) 
                $request .= ' AND ';

            $request .= 'jg7b_customersusers.id_customers = ' . $customerId;
        }

        return $request . ';';
    }
}

