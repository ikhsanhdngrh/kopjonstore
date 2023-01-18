SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `data_barang` (
  `id` int(11) NOT NULL,
  `nmbarang` varchar(50) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_barang`
--

INSERT INTO `data_barang` (`id`, `nmbarang`, `jumlah`,`harga`) VALUES
(1, 'Sepatu', '2',`500000`),
(2, 'baju', '5',`300000`);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id`);
COMMIT;
