
CREATE TABLE `participante` (
  `ID` bigint(20) NOT NULL,
  `NOME` varchar(255) NOT NULL,
  `CPF` int(11) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `ENDERECO` varchar(255) DEFAULT NULL,
  `CIDADE` varchar(255) DEFAULT NULL,
  `CRIADO` timestamp NOT NULL DEFAULT current_timestamp(),
  `ATUALIZADO` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `veiculo` (
  `ID` bigint(20) NOT NULL,
  `MODELO` varchar(255) NOT NULL,
  `MARCA` varchar(255) DEFAULT NULL,
  `ANO_FABRICACAO` int(11) DEFAULT NULL,
  `PLACA` int(11) NOT NULL,
  `PARTICIPANTE_ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `participante`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `PLACA` (`PLACA`),
  ADD KEY `PARTICIPANTE_ID` (`PARTICIPANTE_ID`);

ALTER TABLE `participante`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

ALTER TABLE `veiculo`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

ALTER TABLE `veiculo`
  ADD CONSTRAINT `veiculo_ibfk_1` FOREIGN KEY (`PARTICIPANTE_ID`) REFERENCES `participante` (`ID`);
COMMIT;