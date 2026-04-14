DECLARE @UserId INT;

SELECT @UserId = UserId
FROM TBUsuarios
WHERE Email = 'noilarredroom@gmail.com';

-- Ejemplo: bitácoras de entrada/salida
DELETE FROM TBBitacoraES
WHERE UserId = @UserId;

-- Ejemplo: relaciones usuario-rol
DELETE FROM TBUsuariosRoles
WHERE UserId = @UserId;

-- Ahora sí, borrar el usuario
DELETE FROM TBUsuarios
WHERE UserId = @UserId;


select * from dbo.TBUsuarios

SELECT * FROM dbo.TBRoles;

SELECT * FROM dbo.TBUsuariosRoles;

INSERT INTO dbo.TBUsuariosRoles (UserId, RolId)
VALUES (3, 1);