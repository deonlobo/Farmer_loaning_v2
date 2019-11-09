-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2019 at 07:29 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bankdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `BankID` int(15) NOT NULL,
  `BankName` varchar(20) DEFAULT NULL,
  `Headquaters` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`BankID`, `BankName`, `Headquaters`) VALUES
(80001, 'Allahabad Bank', 'Kolkata'),
(80002, 'Andhra Bank', 'Hyderabad'),
(80003, 'Bank Of Baroda', 'Baroda'),
(80004, 'Bank Of India', 'Mumbai'),
(80005, 'Bank Of  Maharashtra', 'Pune'),
(80006, 'Canara Bank', 'Bengaluru'),
(80007, 'Central Bank Of Indi', 'Mumbai'),
(80008, 'Corporation Bank', 'Mangalore'),
(80009, 'Dena Bank', 'Mumbai'),
(80010, ' IDBI Bank', 'Mumbai'),
(80011, 'Indian Bank', 'Chennai'),
(80014, 'Panjab National Bank', 'New Delhi'),
(80015, 'Syndicate Bank', 'Manipal'),
(80016, 'State Bank of India', 'Mumbai'),
(80018, 'Union Bank of India', 'Mumbai'),
(80020, 'Vijaya Bank', 'Bengaluru');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `LoanID` int(15) NOT NULL,
  `BankID` int(15) DEFAULT NULL,
  `LoanType` varchar(20) DEFAULT NULL,
  `RepayPeriod` int(15) DEFAULT NULL,
  `LoanInterest` float DEFAULT NULL,
  `MaxAmount` double NOT NULL,
  `Margin` float DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `Equipment` varchar(200) NOT NULL,
  `URL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`LoanID`, `BankID`, `LoanType`, `RepayPeriod`, `LoanInterest`, `MaxAmount`, `Margin`, `img`, `Equipment`, `URL`) VALUES
(20006, 80006, 'Crop Loan', 5, 7, 10000000, 16, 'https://images.newindianexpress.com/uploads/user/imagelibrary/2019/5/31/w900X450/IEDEC360_27-12-2018_15_2_19.jpg', 'State Bank of India offers loans for crop production in the form of ACC / KCC. The loan covers the crop production expenses, post-harvest expenses, contingencies, etc. ', 'https://www.creditmantri.com/article-agriculture-loan-in-canara-bank/'),
(20008, 80008, 'Crop Loan', 7, 6, 2000000, 30, 'https://images.newindianexpress.com/uploads/user/imagelibrary/2019/5/31/w900X450/IEDEC360_27-12-2018_15_2_19.jpg', 'State Bank of India offers loans for crop production in the form of ACC / KCC. The loan covers the crop production expenses, post-harvest expenses, contingencies, etc. ', 'https://corpbank.com/node/58822'),
(20018, 80018, 'Crop Loan', 2, 5, 2500000, 15, 'https://images.newindianexpress.com/uploads/user/imagelibrary/2019/5/31/w900X450/IEDEC360_27-12-2018_15_2_19.jpg', 'State Bank of India offers loans for crop production in the form of ACC / KCC. The loan covers the crop production expenses, post-harvest expenses, contingencies, etc. ', 'https://www.unionbankofindia.co.in/english/rabd-short-crop-loan.aspx'),
(30006, 80006, 'Tractor Loan', 5, 10, 500000, 15, 'https://sc01.alicdn.com/kf/HTB1pkolKXXXXXaUXpXXq6xXFXXX4/big-tractor-farm-tractor-wheel-tractor-with.jpg', '130HP 4WD Agricultural Machine Farm/Mini/Diesel/Small Garden/Agricultural Tractor', 'http://www.codeforbanks.com/banking/canara-bank/tractor-loan-interest-rates/'),
(30008, 80008, 'Tractor Loan', 9, 9, 1500000, 30, 'https://sc01.alicdn.com/kf/HTB1pkolKXXXXXaUXpXXq6xXFXXX4/big-tractor-farm-tractor-wheel-tractor-with.jpg', '130HP 4WD Agricultural Machine Farm/Mini/Diesel/Small Garden/Agricultural Tractor', 'https://corpbank.com/node/58822'),
(30018, 80018, 'Tractor Loan', 9, 8, 700000, 15, 'https://sc01.alicdn.com/kf/HTB1pkolKXXXXXaUXpXXq6xXFXXX4/big-tractor-farm-tractor-wheel-tractor-with.jpg', '130HP 4WD Agricultural Machine Farm/Mini/Diesel/Small Garden/Agricultural Tractor', 'https://www.unionbankofindia.co.in/english/agriculture-loan.aspx'),
(31006, 80006, 'Tractor Loan', 7, 10.2, 1000000, 15, 'https://fwi-wp-assets-live.s3-eu-west-1.amazonaws.com/sites/1/web_Fendt-Trisix-c-no-credit.jpg', 'Dq1504 150HP 4X4 4WD Big Agriculture Wheel Farm Tractor Agricultural Farming Tractor with Ce Certificate  ', 'http://www.codeforbanks.com/banking/canara-bank/tractor-loan-interest-rates/'),
(50006, 80006, 'Dairy Loan', 8, 7.5, 2500000, 30, 'https://www.agrifarming.in/wp-content/uploads/2017/02/Dairy-Farming-Business-Plan..jpg', 'We provide loans for the modernisation of creation of infrastructures. Milk houses, automatic milk collection and dispersal systems, transportation vehicles, Bulk Milk Chilling Units are all covered u', 'https://www.canarabank.com/english/bank-services/priority-portal/schemes/agriculture-and-rural-credit-schemes/'),
(50008, 80008, 'Dairy Loan', 10, 10, 1000000, 10, 'https://www.agrifarming.in/wp-content/uploads/2017/02/Dairy-Farming-Business-Plan..jpg', 'We provide loans for the modernisation of creation of infrastructures. Milk houses, automatic milk collection and dispersal systems, transportation vehicles, Bulk Milk Chilling Units are all covered u', 'https://corpbank.com/node/58822'),
(50018, 80018, 'Dairy Loan', 6, 8, 500000, 15, 'https://www.agrifarming.in/wp-content/uploads/2017/02/Dairy-Farming-Business-Plan..jpg', 'We provide loans for the modernisation of creation of infrastructures. Milk houses, automatic milk collection and dispersal systems, transportation vehicles, Bulk Milk Chilling Units are all covered u', 'https://www.unionbankofindia.co.in/english/rabd-finance-nddb.aspx'),
(70006, 80006, 'Fisheries Loan', 9, 9, 900000, 30, 'http://www.dbs.sc/sites/default/files/article-images/fishing.jpg', 'The loan is provided for buying fish seeds, fish net, and other equipment’s', 'https://www.canarabank.com/english/bank-services/priority-portal/schemes/agriculture-and-rural-credit-schemes/'),
(70008, 80008, 'Fisheries Loan', 10, 7, 1000000, 30, 'http://www.dbs.sc/sites/default/files/article-images/fishing.jpg', 'The loan is provided for buying fish seeds, fish net, and other equipment’s', 'https://corpbank.com/node/58822'),
(70018, 80018, 'Fisheries Loan', 9, 11.5, 800000, 20, 'http://www.dbs.sc/sites/default/files/article-images/fishing.jpg', 'The loan is provided for buying fish seeds, fish net, and other equipment’s', 'https://www.unionbankofindia.co.in/english/agriculture-loan.aspx'),
(300006, 80006, 'Tiller Loan', 4, 8.2, 100000, 10, 'http://www.ratedwinners.com/images/products/rototiller.jpg', '212cc7. 5 Horsepower Multi-purpose Tiller Soil Preparation Machine All Gear Shaft Drive Th', ''),
(300008, 80008, 'Tiller Loan', 5, 7.9, 80000, 8, 'http://www.ratedwinners.com/images/products/rototiller.jpg', '212cc7. 5 Horsepower Multi-purpose Tiller Soil Preparation Machine All Gear Shaft Drive Th', ''),
(300018, 80018, 'Tiller Loan', 6, 9.4, 100000, 8, 'http://www.ratedwinners.com/images/products/rototiller.jpg', '212cc7. 5 Horsepower Multi-purpose Tiller Soil Preparation Machine All Gear Shaft Drive Th', ''),
(3000006, 80006, 'Other Loan', 5, 7, 500000, 10, 'https://netstorage-legit.akamaized.net/images/9a43e54081a7797a.jpg?imwidth=900', '73kW/100hp\r\nAmong all the types of equipment that can be used for harvesting grain crops, the combine harvester always occupies the highest position due to its efficiency and the amount of crop that i', ''),
(3000008, 80008, 'Other Loan', 6, 9, 600000, 0, 'https://netstorage-legit.akamaized.net/images/9a43e54081a7797a.jpg?imwidth=900', '73kW/100hp\r\nAmong all the types of equipment that can be used for harvesting grain crops, the combine harvester always occupies the highest position due to its efficiency and the amount of crop that i', ''),
(3000018, 80018, 'Other Loan', 4, 7, 600000, 5, 'https://netstorage-legit.akamaized.net/images/9a43e54081a7797a.jpg?imwidth=900', '73kW/100hp\r\nAmong all the types of equipment that can be used for harvesting grain crops, the combine harvester always occupies the highest position due to its efficiency and the amount of crop that i', ''),
(3100006, 80006, 'Other Loan', 4, 7, 500000, 15, 'https://www.deere.ca/assets/images/region-4/products/hay-and-forage/group-page/hayharvesting-group-r4a049895.jpg', 'In modern farms, forage for various types of animals is harvested using forage harvesting equipment.\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `BranchID` varchar(100) NOT NULL,
  `BankID` int(15) DEFAULT NULL,
  `Branch` varchar(20) DEFAULT NULL,
  `BranchLocation` varchar(255) DEFAULT NULL,
  `IFSC` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`BranchID`, `BankID`, `Branch`, `BranchLocation`, `IFSC`) VALUES
('90007CBIO0017', 80007, 'Central Bank Of Indi', 'Central Bank Of India (Mumbai)', '90007'),
('ALLA0210031', 80001, 'Branch Kolkata', 'ALLAHABAD BANK BUILDING, 14, India Exchange Pl Rd, 1st Floor, Murgighata, B.B.D. Bagh, Kolkata, West Bengal 700001', '90001'),
('ANDB0000208 ', 80002, 'Hyderguda', '1st Floor/United India Insurance Buildingbasheerbagh,Hyderabad-500029', '90002'),
('BARB0AKOTAX', 80003, 'AKOTA BRANCH', 'AKOTA BRANCH, SHREE SHARNAM COMPLEX, PRODUCTIVITY ROAD, BARODA, BARODA, 390020', '90003'),
('BKDN0INDFIN ', 80009, 'Mumbai', 'Dena Bank, Ifb, 9 Th Floor, Maker Tower E, Cuffe Parade, Mumbai - 400005, Mumbai - Maharashtra', '90009'),
('BKID0000066', 80004, 'Altamount Road', 'Altamount road, eastman house, 2-669 altamount road, mumbai(bombay), india, 400026, maharashtra ', '90004'),
('CNRB0000469', 80006, 'Bangalore', 'P B 5471, Krishi Bhavan, Near Polic Corner, Nrupathunga Road, Bangalore -560 002', '90006'),
('CORP0000177', 80008, 'Mukka', '8-120, Nh-17, Mukka-574177, Mangalore Taluk', '90008'),
('MAHB0000381 ', 80005, 'Dakshina Kannada', '1st Floor, Centenary Building, Opp. Janatha Bazar, G H S Road, Mangalore - 575001, Dakshina Kannada - Karnataka', '90005'),
('SBIN0000300 ', 80016, 'Mumbai', 'Mumbai, Mumbai - Maharashtra', '90016'),
('SYNB0000111', 80015, 'Manipal', 'Pb No 13, , Manipal, , Udupi, Karnataka, 576 104', '90015'),
('UBINO533114', 80018, 'Bangalore-Cantonment', '171,COMMERCIAL STREET,DEVIDOSS BUILDING,BANGALORE, KARNATAKA,PIN - 560 001.', '90018'),
('UBINO536440', 80018, 'Padavu Maroli Mangal', 'P. B. NO.932 ,Ramakrishna Complex,Kulshekar Post, D.K. ,Maroli-Pad Karnataka', '90018'),
('VBOI5332', 80020, 'Bangalore Urban ', 'P b no 8227, 29,hosur road, adugodi, bangalore,karnataka, 560030 ', '90020');

-- --------------------------------------------------------

--
-- Table structure for table `faccount`
--

CREATE TABLE `faccount` (
  `AccNo` bigint(15) NOT NULL,
  `FarmerID` int(15) DEFAULT NULL,
  `BranchID` varchar(100) DEFAULT NULL,
  `Balance` float DEFAULT NULL,
  `Interest` float DEFAULT NULL,
  `AccType` varchar(20) DEFAULT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faccount`
--

INSERT INTO `faccount` (`AccNo`, `FarmerID`, `BranchID`, `Balance`, `Interest`, `AccType`, `Password`) VALUES
(111222333444555, 10002, 'UBINO536440', 15000000, 7, 'Savings Account', '2345'),
(123456789000000, 10000, 'UBINO536440', 572601, 4, 'Savings Account', '1234'),
(222333555666777, 10001, 'SBIN0000300 ', 4444300, 6, 'Business Account', '1234'),
(333444555666777, 10001, 'UBINO536440', 3000000, 7, 'Savings Account', '2345'),
(555666777888999, 10002, 'SBIN0000300 ', 2000000, 5, 'Business Account', '1234'),
(987654321000000, 10000, 'BKID0000066', 1000000, 4.5, 'Business Account', '2345');

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `FarmerID` int(15) NOT NULL,
  `Fname` varchar(100) DEFAULT NULL,
  `PAN` varchar(20) DEFAULT NULL,
  `Aadhar` bigint(16) DEFAULT NULL,
  `Faddress` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`FarmerID`, `Fname`, `PAN`, `Aadhar`, `Faddress`) VALUES
(10000, 'Deon Lobo', 'AYNPL5148F', 277044432210, 'Hi Streak ,#403 ,Kulshekar Mangalore'),
(10001, 'Mark Dsouza', 'AYNPL5148G', 112344567765, 'Meena House,Kumbulure,Mubai-110045'),
(10002, 'Gagan Bekal', 'AYNPL5148H', 546733228877, 'Sarika Coplex,#302,Mulki-300674');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `LoanNo` int(11) NOT NULL,
  `Aadhar` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `AccNo` bigint(20) DEFAULT NULL,
  `LoanID` int(11) DEFAULT NULL,
  `Amount` float DEFAULT NULL,
  `LoanDate` timestamp NULL DEFAULT current_timestamp(),
  `Lstatus` varchar(15) DEFAULT NULL,
  `PayDate` timestamp NULL DEFAULT NULL,
  `Approve` varchar(100) NOT NULL,
  `PaidAmount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`LoanNo`, `Aadhar`, `email`, `AccNo`, `LoanID`, `Amount`, `LoanDate`, `Lstatus`, `PayDate`, `Approve`, `PaidAmount`) VALUES
(77044, '277044432210', 'deonvictorlobo@gmail.com', 123456789000000, 30006, 300000, '2019-11-07 03:11:10', 'Pending', '2019-11-07 05:26:24', 'Approved', 37500),
(77047, '277044432210', 'deonvictorlobo@gmail.com', 123456789000000, 30006, 200000, '2019-11-07 08:31:01', 'Pending', NULL, 'Approved', 0),
(77048, '277044432210', 'deonvictorlobo@gmail.com', 123456789000000, 30006, 300000, '2019-11-07 08:43:36', 'Pending', NULL, 'Approved', 0),
(77049, '277044432210', 'deonvictorlobo@gmail.com', 123456789000000, 20006, 100000, '2019-11-08 03:17:14', 'Pending', NULL, 'Approved', 6750),
(77050, '277044432210', 'deonvictorlobo@gmail.com', 123456789000000, 20006, 300000, '2019-11-08 03:34:03', 'Pending', NULL, 'Approved', 0),
(77051, '277044432210', 'deonvictorlobo@gmail.com', 123456789000000, 20006, 100000, '2019-11-08 03:36:18', 'Pending', NULL, 'Approved', 0),
(77052, '277044432210', 'deonvictorlobo@gmail.com', 123456789000000, 50006, 200000, '2019-11-08 04:00:40', 'Paid', '2019-11-08 04:05:08', 'Approved', 9999.99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`BankID`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`LoanID`),
  ADD KEY `BankID` (`BankID`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`BranchID`),
  ADD KEY `BankID` (`BankID`);

--
-- Indexes for table `faccount`
--
ALTER TABLE `faccount`
  ADD PRIMARY KEY (`AccNo`),
  ADD KEY `FarmerID` (`FarmerID`),
  ADD KEY `BranchID` (`BranchID`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`FarmerID`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`LoanNo`),
  ADD KEY `AccNo` (`AccNo`),
  ADD KEY `LoanID` (`LoanID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `LoanNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77053;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`BankID`) REFERENCES `bank` (`BankID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branch`
--
ALTER TABLE `branch`
  ADD CONSTRAINT `branch_ibfk_1` FOREIGN KEY (`BankID`) REFERENCES `bank` (`BankID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faccount`
--
ALTER TABLE `faccount`
  ADD CONSTRAINT `faccount_ibfk_1` FOREIGN KEY (`FarmerID`) REFERENCES `farmer` (`FarmerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faccount_ibfk_2` FOREIGN KEY (`BranchID`) REFERENCES `branch` (`BranchID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `loan_ibfk_1` FOREIGN KEY (`AccNo`) REFERENCES `faccount` (`AccNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loan_ibfk_2` FOREIGN KEY (`LoanID`) REFERENCES `borrow` (`LoanID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
