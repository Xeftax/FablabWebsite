const sqlite3 = require('sqlite3');
const dbname = 'main.db';

let db = new sqlite3.Database(dbname, err => {
    if (err) 
        throw err

    console.log('database stated on ' + dbname)

    //db.run('CREATE TABLE Machines(itemId INT NOT NULL AUTO_INCREMENT, title TEXT, state INT, waitingTime INT, picture TEXT, waitNumber INT, descTitle TEXT, decription TEXT, descPicture TEXT, descLink TEXT, PRIMARY KEY (itemId))')

    //db.run('INSERT INTO machines(itemId, title) VALUES(0, "Speedy 400")')
    
    //db.run('DELETE FROM Machines WHERE title="Speedy 400"')

    db.get('SELECT title FROM machines WHERE itemId=0', (err, data) => {
        if (err)
            throw err;

        console.log(data.title)
    })
})