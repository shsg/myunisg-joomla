CREATE TABLE IF NOT EXISTS #__events (
  id int(11) NOT NULL AUTO_INCREMENT,
  club_id int(11) NOT NULL,
  category_id int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  date_begin datetime NOT NULL,
  date_end datetime DEFAULT NULL,
  place varchar(200) NOT NULL,
  description varchar(1000) NOT NULL,
  record_updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  record_updated_user varchar(100) NOT NULL,
  record_visible varchar(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS #__events_attachement (
  id int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  link varchar(500) DEFAULT NULL,
  `file` varchar(500) DEFAULT NULL,
  link_thumb varchar(500) DEFAULT NULL,
  file_thumb varchar(500) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  record_updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);