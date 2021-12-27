<!DOCTYPE html>
<html>

<head>
  <title>csv-sql</title>
</head>

<body>
   

    <form enctype="multipart/form-data" action="import_csv1.php" method="post">
        <div class="input-row">
            <label class="col-md-4 control-label">Choisir un fichier CSV pour le semestre 1</label>
            <input type="file" name="file" id="file" accept=".csv">
            <br />
            <br />
            <button type="submit" id="submit" name="import" class="btn-submit">Import</button>
            <br />
        </div>
    </form>
    <form enctype="multipart/form-data" action="import_csv2.php" method="post">
        <div class="input-row">
            <label class="col-md-4 control-label">Choisir un fichier CSV pour le semestre 2</label>
            <input type="file" name="file" id="file" accept=".csv">
            <br />
            <br />
            <button type="submit" id="submit" name="import" class="btn-submit">Import</button>
            <br />
        </div>
    </form>
    <form enctype="multipart/form-data" action="import_csv3.php" method="post">
        <div class="input-row">
            <label class="col-md-4 control-label">Choisir un fichier CSV pour le semestre 3</label>
            <input type="file" name="file" id="file" accept=".csv">
            <br />
            <br />
            <button type="submit" id="submit" name="import" class="btn-submit">Import</button>
            <br />
        </div>
    </form>
    <form enctype="multipart/form-data" action="truncate.php" method="post">
            <br />
            <br />
            <br />
            <button type="submit" id="submit" name="import" class="btn-submit">Vider les tables</button>
            <br />
        </div>
    </form>
    <form enctype="multipart/form-data" action="redirect.php" method="post">
            <br />
            <br />
            <br />
            <button type="submit" id="submit" name="import" class="btn-submit">Accueil</button>
            <br />
        </div>
    </form>
        
</body>
</html>