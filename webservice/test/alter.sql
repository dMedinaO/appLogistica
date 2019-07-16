

ALTER TABLE documento_en_ruta DROP FOREIGN KEY fk_documento_en_ruta_comprobante1;
ALTER TABLE documento_en_ruta DROP comprobante;


ALTER TABLE comprobante add column iddocumento integer after idcomprobante;
ALTER TABLE comprobante add column idruta integer after idcomprobante;
ALTER TABLE comprobante ADD CONSTRAINT FOREIGN KEY (idruta) REFERENCES documento_en_ruta (ruta);
ALTER TABLE comprobante ADD CONSTRAINT FOREIGN KEY (iddocumento) REFERENCES documento_en_ruta (documento);
ALTER TABLE comprobante CHANGE idcomprobante idcomprobante INT(11) AUTO_INCREMENT;
ALTER TABLE comprobante ADD column path VARCHAR(255) UNIQUE;

ALTER TABLE comentarioRecepcion add column estado VARCHAR(50);
ALTER TABLE comentarioRecepcion add column motivo VARCHAR(255);
ALTER TABLE comentarioRecepcion add column receptor VARCHAR(255);

ALTER TABLE documento_en_ruta DROP FOREIGN KEY fk_documento_en_ruta_comentarioRecepcion1;
ALTER TABLE comentarioRecepcion CHANGE idcomentario idcomentario INT(11) AUTO_INCREMENT;
ALTER TABLE documento_en_ruta ADD CONSTRAINT FOREIGN KEY (comentario) REFERENCES comentarioRecepcion (idcomentario) ON DELETE SET NULL;


ALTER TABLE geoPoint add column rutCliente VARCHAR(45) NOT NULL;
ALTER TABLE geoPoint add CONSTRAINT FOREIGN KEY (rutCliente) REFERENCES cliente (rutCliente);


ALTER TABLE geoPoint CHANGE direccion direccion INTEGER(11);
ALTER TABLE geoPoint CHANGE idgeopoint idgeopoint INTEGER(11) AUTO_INCREMENT;