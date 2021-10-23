/*CREATE TABLE IF NOT EXISTS machines(
    itemId INT AUTO_INCREMENT, 
    title TEXT, state INT, 
    waitingTime INT, 
    picture TEXT, 
    waitNumber INT, 
    descTitle TEXT, 
    decription TEXT, 
    descPicture TEXT, 
    descLink TEXT, 
    PRIMARY KEY (itemId)
)WITHOUT ROWID*/

/*INSERT INTO machines(itemID, title) VALUES(0, "Speedy 400")*/

SELECT title FROM machines WHERE itemId=0
