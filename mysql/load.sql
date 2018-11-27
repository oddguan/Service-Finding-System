LOAD DATA LOCAL INFILE "/home/cguan3/p1m3/data/reg_info.dat" INTO TABLE Registration FIELDS TERMINATED BY ",";
LOAD DATA LOCAL INFILE "/home/cguan3/p1m3/data/supply.dat" INTO TABLE Supply FIELDS TERMINATED BY ",";
LOAD DATA LOCAL INFILE "/home/cguan3/p1m3/data/demand.dat" INTO TABLE Demand FIELDS TERMINATED BY ",";
LOAD DATA LOCAL INFILE "/home/cguan3/p1m3/data/order.dat" INTO TABLE Order_History FIELDS TERMINATED BY ",";

