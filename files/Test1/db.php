<? 
class Db  {
    public $pdo;
    private function config()
    {
        return include __DIR__ . '/config.php';
    }
    public function __construct()
    {
        $config = $this->config();
        $dsn = 'mysql:dbname='.$config['db']['dbname'].';host='.$config['db']['host'];
        $this->pdo = new Pdo($dsn, $config['db']['user'], $config['db']['password']);
    }
   public function query($sql)
   {
       $sth = $this->pdo->prepare($sql);
       $sth->setFetchMode((PDO::FETCH_OBJ));
       $sth->execute();
       return $sth->fetchAll();
   }
    public function queryoun($sql)
    {
        $sth = $this->pdo->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

}
?>