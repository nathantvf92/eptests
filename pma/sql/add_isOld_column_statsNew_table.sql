ALTER TABLE stats_new
ADD COLUMN isOld BINARY DEFAULT 0;
UPDATE stats_new
SET isOld = 1 WHERE isOld = 0;
