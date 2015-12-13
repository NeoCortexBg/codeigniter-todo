
BEGIN;


CREATE TABLE "user"
(
  user_sid serial NOT NULL,
  email character varying(256) NOT NULL,
  password character varying(100) NOT NULL,
  CONSTRAINT user_pkey PRIMARY KEY (user_sid )
)
WITH (
  OIDS=FALSE
);

CREATE TABLE project
(
  project_sid serial NOT NULL,
  name character varying(100) NOT NULL,
  CONSTRAINT project_pkey PRIMARY KEY (project_sid )
)
WITH (
  OIDS=FALSE
);

CREATE TABLE todo_status
(
  todo_status_sid serial NOT NULL,
  name character varying(20) NOT NULL,
  CONSTRAINT todo_status_pkey PRIMARY KEY (todo_status_sid )
)
WITH (
  OIDS=FALSE
);

INSERT INTO todo_status (todo_status_sid, name) VALUES (1, 'open');
INSERT INTO todo_status (todo_status_sid, name) VALUES (2, 'closed');
INSERT INTO todo_status (todo_status_sid, name) VALUES (3, 'resolved');
INSERT INTO todo_status (todo_status_sid, name) VALUES (4, 'waiting');
INSERT INTO todo_status (todo_status_sid, name) VALUES (5, 'postponed');

CREATE TABLE todo
(
  todo_sid serial NOT NULL,
  project_sid integer,
  todo_status_sid integer NOT NULL,
  text text NOT NULL,
  priority integer NOT NULL DEFAULT 0,
  date_created timestamp(0) without time zone NOT NULL,
  date_updated timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
  CONSTRAINT todo_pkey PRIMARY KEY (todo_sid ),
  CONSTRAINT fk_5a0eb6a09483afc4 FOREIGN KEY (todo_status_sid)
      REFERENCES todo_status (todo_status_sid) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fk_5a0eb6a0c56da057 FOREIGN KEY (project_sid)
      REFERENCES project (project_sid) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);

COMMIT;
