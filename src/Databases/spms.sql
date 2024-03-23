-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2024 at 04:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spms`
--

-- --------------------------------------------------------

--
-- Table structure for table `spms_faculty`
--

CREATE TABLE `spms_faculty` (
  `faculty_name` varchar(70) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `faculty_email` varchar(120) NOT NULL,
  `faculty_password` varchar(300) NOT NULL,
  `faculty_sign_up` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spms_faculty`
--

INSERT INTO `spms_faculty` (`faculty_name`, `faculty_id`, `faculty_email`, `faculty_password`, `faculty_sign_up`) VALUES
('Name101', 101, 'email101@example.com', '$2y$10$EzGyuGYrGoav1LPQtjothOBETSf6Rmtqu3n/H6AfyRMdY/ZBNY.o2', '2024-03-23 20:30:46'),
('Name102', 102, 'email102@example.com', '$2y$10$WUa6AjfdJUtQiNbn740zt.VDbjGN/2w.I5UHUgnhH8B8TGboScae6', '2024-03-23 20:30:46'),
('Name103', 103, 'email103@example.com', '$2y$10$tkJLCpgYkkpS8uq1Azqmd.vxj9Ckh.O/sltDHoxZGv6PyfVVxLx9i', '2024-03-23 20:30:46'),
('Name104', 104, 'email104@example.com', '$2y$10$e4XJLLv33AeBRb19puIyJ.BkknbKLHp4Ag0QKZ7Mx3Pz0YIHSZIeq', '2024-03-23 20:30:46'),
('Name105', 105, 'email105@example.com', '$2y$10$7migAxTnPE4ktjXPNvmAxeuvRoFhA0GEneymDjBREvwljJFaS8S/m', '2024-03-23 20:30:46'),
('Name106', 106, 'email106@example.com', '$2y$10$1LNubyhFMmmV1E6JScN6a.m5.6Ip7tuqKIBqOh4CTcb.xoNClPsdi', '2024-03-23 20:30:46'),
('Name107', 107, 'email107@example.com', '$2y$10$UvumXLHa5soi/jLZGGwJoOKD8A1cer41xxcyq7ZxFwqAHL4oKAROe', '2024-03-23 20:30:46'),
('Name108', 108, 'email108@example.com', '$2y$10$yGYJfVexqX/kgOsQ2.MPr.l2G.M9b91iyUdMF6z8Q.USgjLLETuv2', '2024-03-23 20:30:46'),
('Name109', 109, 'email109@example.com', '$2y$10$iThr4gKVRaGanxqq5h3l7OMoZtpH0RdB8qid2Hhz/gVsY4Nh9nMhy', '2024-03-23 20:30:46'),
('Name110', 110, 'email110@example.com', '$2y$10$oes0ytJO/2b9noo86OazJOxifXDlIcfzsOSuVzx37/wMMUUUaOj4i', '2024-03-23 20:30:46'),
('Name111', 111, 'email111@example.com', '$2y$10$coBk68KkS9EqfUhFk7AtsuLMJdV6ksTLoZozc7Xkt89I9NlnD3NbS', '2024-03-23 20:30:46'),
('Name112', 112, 'email112@example.com', '$2y$10$b5t3WGIrJslcTHD4wDRqCu9u63AeLY7TtcZGgh3P5ap5YeK4f9are', '2024-03-23 20:30:46'),
('Name113', 113, 'email113@example.com', '$2y$10$McGVCf1NHPAxQ6a3rDURX.rhyKNA7F/9Qn3KiitU1dqX60/pHWJZK', '2024-03-23 20:30:46'),
('Name114', 114, 'email114@example.com', '$2y$10$GE98p3ReusRgp0TmokBcU.eabUpAPzYNypylcO2ifp0UnEml0W5Yi', '2024-03-23 20:30:46'),
('Name115', 115, 'email115@example.com', '$2y$10$fD/U4Acywvai7nk.nWVZoOO0Lhdz9OcHLNCux.mReYiGCxt.AaVjG', '2024-03-23 20:30:46'),
('Name116', 116, 'email116@example.com', '$2y$10$NFBaDktRntgEFklZP8NGs.2QVis9wwTkoHdWHohovNu4vlWizKSqa', '2024-03-23 20:30:46'),
('Name117', 117, 'email117@example.com', '$2y$10$uVtDr.X37kYgoIMHgfJzbe7oj8Kafl/6eejrAEQyS1L9CJhuxsSN2', '2024-03-23 20:30:46'),
('Name118', 118, 'email118@example.com', '$2y$10$jJ34Fjx5UliYFMX4uqKj4.WUg/UA3H37hdYHxKiXSfgbXVHyht1Pi', '2024-03-23 20:30:47'),
('Name119', 119, 'email119@example.com', '$2y$10$qhPRMzy9K1z1aVwrTZYxlerl4k8WoALXT/DQYhNwgwlRae.pS9Pvi', '2024-03-23 20:30:47'),
('Name120', 120, 'email120@example.com', '$2y$10$eGpo5iQNmd98pOE6sUL6V.7qHCu2U.6noD0U8Ave6YMaAdG9CfMke', '2024-03-23 20:30:47'),
('Name121', 121, 'email121@example.com', '$2y$10$uoW.iqxOtF/hnEe2yQQXd.rHrfzHKD.XeJtxcaTbTqURbKtVt4zkS', '2024-03-23 20:30:47'),
('Name122', 122, 'email122@example.com', '$2y$10$agtNk5GVIQt113Sjf7IDeOeCvB5eyMVeCnTkHTsywkBCrssHp2S02', '2024-03-23 20:30:47'),
('Name123', 123, 'email123@example.com', '$2y$10$yDaCtW6Id.GZojx3vG/mmOvoQ/0g/BWP1dramqln62ildGIwac7Uq', '2024-03-23 20:30:47'),
('Name124', 124, 'email124@example.com', '$2y$10$jhIfOayzRyuWqrLWOFaXpesjuPok/f0ZJoLfw9RW3HXWvdnr4IC6O', '2024-03-23 20:30:47'),
('Name125', 125, 'email125@example.com', '$2y$10$MtyvGKFkSP2XNSaxjyA3beOEfXGq4Dk70TJldmAPjs3HedwWla5X6', '2024-03-23 20:30:47'),
('Name126', 126, 'email126@example.com', '$2y$10$D59fwBld7J9hG8J3UIhG2.r4GK4htY2TaPefWXI5yv6mJBy3a8Rm6', '2024-03-23 20:30:47'),
('Name127', 127, 'email127@example.com', '$2y$10$RZqhlzKPBn88xWRxBl.eMeMH9jNlRMaSOuEeLXzYImUqJoXL18mb2', '2024-03-23 20:30:47'),
('Name128', 128, 'email128@example.com', '$2y$10$tgICL82u60JRq60Fa19C5edylva1QhmOVs8sqwyf82qf/cHAYR6rq', '2024-03-23 20:30:47'),
('Name129', 129, 'email129@example.com', '$2y$10$eFmaYruBOdoftbaE.X8UpOdwVH3rXvwvypmSghgAJxJGJ4nX7PVOS', '2024-03-23 20:30:47'),
('Name130', 130, 'email130@example.com', '$2y$10$B6QGF/AJUyBaTMknfi48Ju7T5v/8W8TdCXlnaGjsTl8rtL29utJJm', '2024-03-23 20:30:47'),
('Name131', 131, 'email131@example.com', '$2y$10$JaB/53n3C.2.bzZgbFGsHOPZ/jjIRJbjbBhDzJD86gTq76OUR3456', '2024-03-23 20:30:47'),
('Name132', 132, 'email132@example.com', '$2y$10$wjaqHKy4jAtzPBkrw3RTSuuxyRSkiDLFPDxhhyAMNk6pTtlkiSrW2', '2024-03-23 20:30:47'),
('Name133', 133, 'email133@example.com', '$2y$10$WmkhOLxNmC7eNQQEgQ2cq.mvOe8CpFP9/2bByYWdu8RG0UjCi4pYe', '2024-03-23 20:30:47'),
('Name134', 134, 'email134@example.com', '$2y$10$piUBexs2Le0nbFAOUcbktuYUBUKvxvcq910xzaXW0bYZdS6sphFVW', '2024-03-23 20:30:47'),
('Name135', 135, 'email135@example.com', '$2y$10$if64dLmXn7sKtMsdDGKNauvlNallYli8ifeBJWMPFW8.8ywmtbzqS', '2024-03-23 20:30:47'),
('Name136', 136, 'email136@example.com', '$2y$10$UMDCccIVzeI.DfowxKBjY.s5Mz5rztLj7GT4CGxkK2ocdd.GGaiue', '2024-03-23 20:30:48'),
('Name137', 137, 'email137@example.com', '$2y$10$B6/tP1iX5OoXjdZ.bfOEC.8OxN1ts3fxXKV/eVlMSBd.zsfu6Sn0y', '2024-03-23 20:30:48'),
('Name138', 138, 'email138@example.com', '$2y$10$wtihvKqr9j8RPmOiVlJ..uxD0qlBra4OIDytjmAVcQ/jSW7POkCge', '2024-03-23 20:30:48'),
('Name139', 139, 'email139@example.com', '$2y$10$kannAYFCfoHrm2UxxPDsLuB2C6EE8zdaE5nd2/AGXcj225CMjINzu', '2024-03-23 20:30:48'),
('Name140', 140, 'email140@example.com', '$2y$10$ekp5GrjiJIanx6LyBLKl6uPoivF5bT6uvumuztcBQjWRUsLYG8Nke', '2024-03-23 20:30:48'),
('Name141', 141, 'email141@example.com', '$2y$10$xMJhCvtAH4Mu4wmsVa20dOxC0OiEuCZPrgpUz1hSQrDXsgwvfgU1e', '2024-03-23 20:30:48'),
('Name142', 142, 'email142@example.com', '$2y$10$/YHYxQzi/SSi2fE.G1oNh.JqhtOgAztdjrp2G6D7KegLrSWj06Fpe', '2024-03-23 20:30:48'),
('Name143', 143, 'email143@example.com', '$2y$10$ZWPUH5JIoxSBE7yid9hNROMlDnejQhpPe1fWA2ygO1eVlCHaaTKY.', '2024-03-23 20:30:48'),
('Name144', 144, 'email144@example.com', '$2y$10$GHmKG3Zoo742xzyWoAJZLOoROR4vYYK6yewI0f1GAKjdhBt3k0BN.', '2024-03-23 20:30:48'),
('Name145', 145, 'email145@example.com', '$2y$10$YWO9SMVhs7cBlwrQaXHI0uJugditqH1ialr.mfS/wrDruIHBMQCme', '2024-03-23 20:30:48'),
('Name146', 146, 'email146@example.com', '$2y$10$nEwDwkSiPr2VXrXGuv0DHuPPdeTt7WP2w0u8GgvCsne6cfYNG96sm', '2024-03-23 20:30:48'),
('Name147', 147, 'email147@example.com', '$2y$10$wVG5Jev7FhRH5gZZrZ8/g.cFoiULudCCx6uYL6CuC7or2Yfjk9Sr.', '2024-03-23 20:30:48'),
('Name148', 148, 'email148@example.com', '$2y$10$N/E0hvXtlUzHBJtl540NEeZ0nhIAkbrioaYCOzMuNi7ZDnzyvANQu', '2024-03-23 20:30:48'),
('Name149', 149, 'email149@example.com', '$2y$10$b4hpUn7fSlIDPL3uKBhqcOH7FxTT7qq//CFgmp9se7lN9wFo33vi2', '2024-03-23 20:30:48'),
('Name150', 150, 'email150@example.com', '$2y$10$f9dcPoJtKb73BLjEwcWC4u9cJ042vDVT0zR3f84z4FNVJ60YJrNou', '2024-03-23 20:30:48'),
('Name151', 151, 'email151@example.com', '$2y$10$KeHPTu7v4rpV4x2DrTk88.FbHA/.Fr1ZdhMp71mtvAIN2ld/7nC3W', '2024-03-23 20:30:48'),
('Name152', 152, 'email152@example.com', '$2y$10$zsbn2p8m90xPEfmKgedfPeWGI9tIT/W5tvUXpU9EWpRlRvM3G57ly', '2024-03-23 20:30:48'),
('Name153', 153, 'email153@example.com', '$2y$10$WXkDMBZqiXvi.08ffTcoyuh0dR1dnml3Fq5eqGZDKWfmoPlRtHT3K', '2024-03-23 20:30:48'),
('Name154', 154, 'email154@example.com', '$2y$10$EkNaBY3O.amB2cprLxzsbe4zfZXghkRtmsjqdBj2lBmzysjpIHlVq', '2024-03-23 20:30:49'),
('Name155', 155, 'email155@example.com', '$2y$10$fYofUmtjvjQrxvThvhZeBeauhc0JZUOlEF1dMdhCu7oA1swqRuY3S', '2024-03-23 20:30:49'),
('Name156', 156, 'email156@example.com', '$2y$10$cmKh21minkFHAtqWAuDSj.vPxbSUjGHoZ8NiGIc7Goahfk/NJ69yW', '2024-03-23 20:30:49'),
('Name157', 157, 'email157@example.com', '$2y$10$qBf6iFoI7.zILRN1F/HTpeglvojqMcdpsocs8QptfvQPFHwVytcKy', '2024-03-23 20:30:49'),
('Name158', 158, 'email158@example.com', '$2y$10$vNJ8Gw8c/iFLvr/eGIMVaOG2ide1Nyl0Fgjua1jQJzFZN7Qd1ZG76', '2024-03-23 20:30:49'),
('Name159', 159, 'email159@example.com', '$2y$10$HOEqJ73FF3uNByvS0B3kz.zBaPvYpfTsMHP3XRac3eXAkgCA17M6e', '2024-03-23 20:30:49'),
('Name160', 160, 'email160@example.com', '$2y$10$icbafDIjDTWIaCKhw0Rf.e.abXNvDno3tVCvD3RajezWpew5GraBe', '2024-03-23 20:30:49'),
('Name161', 161, 'email161@example.com', '$2y$10$XiYRo5KfuHfVnGqiIBoi8uDhlRr7W06ii0dRGItqWAIO6JH8PYc.i', '2024-03-23 20:30:49'),
('Name162', 162, 'email162@example.com', '$2y$10$N9SFADSpeY7dWUFmUKuaguyceqTDhqfazIgAMLbDgMRawUGlH02PG', '2024-03-23 20:30:49'),
('Name163', 163, 'email163@example.com', '$2y$10$r08v655d9U9P1VAJ7M1f7ebgScI26np.7yCBaGHnj5bedDX5fqy2e', '2024-03-23 20:30:49'),
('Name164', 164, 'email164@example.com', '$2y$10$I26foJqFxjVsrIz06OonSuxRpbI/Bp6lRDDTCKsDfa6GnWMiflBhC', '2024-03-23 20:30:49'),
('Name165', 165, 'email165@example.com', '$2y$10$nWHRTbTYwVHosdw.NUgTfe0a9c8rxi/7r6srIk/gX.MIYS/h9QKCC', '2024-03-23 20:30:49'),
('Name166', 166, 'email166@example.com', '$2y$10$gCPJqJDgqbNwavoTjeKBJ./Yn9ji4g77OKJ974uz8b03nw5ikoGVO', '2024-03-23 20:30:49'),
('Name167', 167, 'email167@example.com', '$2y$10$d8KDgvvJA9I/MUCUzYNpG.mT7G7MoLnaHOnVPIIRqQWifQV/.yAIW', '2024-03-23 20:30:49'),
('Name168', 168, 'email168@example.com', '$2y$10$dHrLa0qM8OqeZL54rOLpIeB3xuqtI/tx.mEKcIi.LhctObrOOMogq', '2024-03-23 20:30:49'),
('Name169', 169, 'email169@example.com', '$2y$10$fMGUpyV0L58FswkE9qav1eSGoCO2h.CftRw/ux2aQgMCCPpGDIN2y', '2024-03-23 20:30:49'),
('Name170', 170, 'email170@example.com', '$2y$10$yaQ9/EEq5r1lYA3ojsjTTuOaLdeboqXVAEE8u59ANQaCSdbuT3IXG', '2024-03-23 20:30:49'),
('Name171', 171, 'email171@example.com', '$2y$10$9U5wYnU7wYYfZ6bjjRXvaesgkrZVdCCkgr1epLIs6HwbmGFzG9CF6', '2024-03-23 20:30:49'),
('Name172', 172, 'email172@example.com', '$2y$10$vTP02ZUzoOlvSGIYP4jzVepinDKEghxnBlQa5OEeQ05s6Fz4LbKwu', '2024-03-23 20:30:49'),
('Name173', 173, 'email173@example.com', '$2y$10$5nSU3ACRA3jRkMrAMZozbeGpDqqK9bUeR2T9nYV0q7a.LKQ7ZLJSy', '2024-03-23 20:30:50'),
('Name174', 174, 'email174@example.com', '$2y$10$MVz5ialzoKEKAoXsuikLUOXG3KmLPv5dOFZwIYnODppr4KAiE3z/S', '2024-03-23 20:30:50'),
('Name175', 175, 'email175@example.com', '$2y$10$T4XzqbhqRuuA6sm47fQR9.95thm9jZDy2xK4frcdtNqnDBkf.3ORi', '2024-03-23 20:30:50'),
('Name176', 176, 'email176@example.com', '$2y$10$mCYKwnI2xqBXhBvBAB0jHu6zWkHLPrz96ygSn56G.KxWDQezQaGma', '2024-03-23 20:30:50'),
('Name177', 177, 'email177@example.com', '$2y$10$.uojtbpnCpjSZwxGjgAsbuiYxWnH/u18.nkccw4isdZHGsbRFM3J6', '2024-03-23 20:30:50'),
('Name178', 178, 'email178@example.com', '$2y$10$WpREhT.BFfYUnhmKmbe/zuojksxZKgqhAqMWnZm2vXn2QDCQaMYVq', '2024-03-23 20:30:50'),
('Name179', 179, 'email179@example.com', '$2y$10$L/Y92VY98PRl087KOPKQZu4bTeAEReItqZeSz.LLJVJLOAsYipX16', '2024-03-23 20:30:50'),
('Name180', 180, 'email180@example.com', '$2y$10$q1YCnG/PmBc2Tl6ZSLAvLOUNE9qnfNoOg1wdrH.hyGCwd5DL.XErO', '2024-03-23 20:30:50'),
('Name181', 181, 'email181@example.com', '$2y$10$uATPMgNnYhDLOD4sjYHRwuVIVpwKhBLVQnTEKykdjUhiU3/2xxjCS', '2024-03-23 20:30:50'),
('Name182', 182, 'email182@example.com', '$2y$10$oCd5aIEyDwWKFFwCCFVchuGBn7be4m1cZjiruwJOmAZS0goQuhMB6', '2024-03-23 20:30:50'),
('Name183', 183, 'email183@example.com', '$2y$10$o2RQy.MrmVQzVEo2/3W94.fwfs4TKO58LCkODrJ9u2MgISU2ZX1ya', '2024-03-23 20:30:50'),
('Name184', 184, 'email184@example.com', '$2y$10$54k5Qnd7DPbu3V.3oIs6IuypDJbI5OhsZpB8q/4aPjW8aKzCMPFq6', '2024-03-23 20:30:50'),
('Name185', 185, 'email185@example.com', '$2y$10$QMloj8n4iOTBR2c4bezEhO4PIu9PucJGqGSp0rBJeuLbk11pWg7BC', '2024-03-23 20:30:50'),
('Name186', 186, 'email186@example.com', '$2y$10$UD3BM9xGj770Zi90NqwHDepAZPCRUhP8tMiL.AYO7/M9j42fiqQlm', '2024-03-23 20:30:50'),
('Name187', 187, 'email187@example.com', '$2y$10$9My6BwYP0tvyoDKfSzjlKe/b9rBjLHMeEHGzPwypNcijzbAqlVcNO', '2024-03-23 20:30:50'),
('Name188', 188, 'email188@example.com', '$2y$10$yk2w2iPLCVsr8qshpXloaeic4HCYCfAgJO4MhmE7HW3kaBgkQ3Ijy', '2024-03-23 20:30:50'),
('Name189', 189, 'email189@example.com', '$2y$10$TvaXX5vIYl7U8uDPmn7ZVuli2oetbacih/HKjJas8oBEaFvbJQfkO', '2024-03-23 20:30:50'),
('Name190', 190, 'email190@example.com', '$2y$10$122h9NYxYk3G1qBR8bXguOBsRNxQ/9hmkSLY0B6C2dM7fv.DCSo2.', '2024-03-23 20:30:50'),
('Name191', 191, 'email191@example.com', '$2y$10$/so6iy0T5uaT.NiYmPaYSOMdZerlErYrPJRcoSABV3tpAuem8XLfu', '2024-03-23 20:30:51'),
('Name192', 192, 'email192@example.com', '$2y$10$f6vJbp.IMlgfLPjApuJiceNscNUH/ZY7t.czvV8lX0x8jG7v4C2Z2', '2024-03-23 20:30:51'),
('Name193', 193, 'email193@example.com', '$2y$10$p243CVjEfhUa206mX0uVpO.ElloWIjpIxtFoYQqr8eFbR6pCueIsW', '2024-03-23 20:30:51'),
('Name194', 194, 'email194@example.com', '$2y$10$3TIjYJWYM0KgbKQa45hNdeKpuTOOGaRj4AYUlEIFPvGa8Ktlr785a', '2024-03-23 20:30:51'),
('Name195', 195, 'email195@example.com', '$2y$10$gMMwnP3aXokfSkKlUoAmfe.kBVW9sIPbBZH85iMifjVAiekv31pou', '2024-03-23 20:30:51'),
('Name196', 196, 'email196@example.com', '$2y$10$U4uD2XGsIsGKEDS9Rr/AJ.pJS0/2ZCAEl1t70UAGQoQyoeB63zb5u', '2024-03-23 20:30:51'),
('Name197', 197, 'email197@example.com', '$2y$10$HM2gLXsFQnEJHln8bcJbeuCLN1viVvGka4mVC43kXBufO2YfxiTHm', '2024-03-23 20:30:51'),
('Name198', 198, 'email198@example.com', '$2y$10$apcIS7ah4IBUUh9tFd0Wbue2oi5pZR5JvTfEeXUNXFYBFqEU7qlNW', '2024-03-23 20:30:51'),
('Name199', 199, 'email199@example.com', '$2y$10$ZH8U/NzasiPriLtpwR/mbef4uU2fjXLDiN1M4xp.0Ei1xwps1mgsO', '2024-03-23 20:30:51'),
('Name200', 200, 'email200@example.com', '$2y$10$nBLFVxfPWtlaDfOUugxxbeH1RXFCNn5Pdvdnpzad4efgQVfZmrM5K', '2024-03-23 20:30:51');

-- --------------------------------------------------------

--
-- Table structure for table `spms_parent`
--

CREATE TABLE `spms_parent` (
  `parent_name` varchar(70) NOT NULL,
  `child_enrollement_number` int(11) NOT NULL,
  `parent_email` varchar(120) DEFAULT NULL,
  `parent_phone_number` int(13) NOT NULL,
  `parent_password` varchar(300) NOT NULL,
  `parent_sing_up` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spms_parent`
--

INSERT INTO `spms_parent` (`parent_name`, `child_enrollement_number`, `parent_email`, `parent_phone_number`, `parent_password`, `parent_sing_up`) VALUES
('Name101', 101, 'email101@example.com', 1000000101, '$2y$10$EzGyuGYrGoav1LPQtjothOBETSf6Rmtqu3n/H6AfyRMdY/ZBNY.o2', '2024-03-23 20:30:46'),
('Name102', 102, 'email102@example.com', 1000000102, '$2y$10$WUa6AjfdJUtQiNbn740zt.VDbjGN/2w.I5UHUgnhH8B8TGboScae6', '2024-03-23 20:30:46'),
('Name103', 103, 'email103@example.com', 1000000103, '$2y$10$tkJLCpgYkkpS8uq1Azqmd.vxj9Ckh.O/sltDHoxZGv6PyfVVxLx9i', '2024-03-23 20:30:46'),
('Name104', 104, 'email104@example.com', 1000000104, '$2y$10$e4XJLLv33AeBRb19puIyJ.BkknbKLHp4Ag0QKZ7Mx3Pz0YIHSZIeq', '2024-03-23 20:30:46'),
('Name105', 105, 'email105@example.com', 1000000105, '$2y$10$7migAxTnPE4ktjXPNvmAxeuvRoFhA0GEneymDjBREvwljJFaS8S/m', '2024-03-23 20:30:46'),
('Name106', 106, 'email106@example.com', 1000000106, '$2y$10$1LNubyhFMmmV1E6JScN6a.m5.6Ip7tuqKIBqOh4CTcb.xoNClPsdi', '2024-03-23 20:30:46'),
('Name107', 107, 'email107@example.com', 1000000107, '$2y$10$UvumXLHa5soi/jLZGGwJoOKD8A1cer41xxcyq7ZxFwqAHL4oKAROe', '2024-03-23 20:30:46'),
('Name108', 108, 'email108@example.com', 1000000108, '$2y$10$yGYJfVexqX/kgOsQ2.MPr.l2G.M9b91iyUdMF6z8Q.USgjLLETuv2', '2024-03-23 20:30:46'),
('Name109', 109, 'email109@example.com', 1000000109, '$2y$10$iThr4gKVRaGanxqq5h3l7OMoZtpH0RdB8qid2Hhz/gVsY4Nh9nMhy', '2024-03-23 20:30:46'),
('Name110', 110, 'email110@example.com', 1000000110, '$2y$10$oes0ytJO/2b9noo86OazJOxifXDlIcfzsOSuVzx37/wMMUUUaOj4i', '2024-03-23 20:30:46'),
('Name111', 111, 'email111@example.com', 1000000111, '$2y$10$coBk68KkS9EqfUhFk7AtsuLMJdV6ksTLoZozc7Xkt89I9NlnD3NbS', '2024-03-23 20:30:46'),
('Name112', 112, 'email112@example.com', 1000000112, '$2y$10$b5t3WGIrJslcTHD4wDRqCu9u63AeLY7TtcZGgh3P5ap5YeK4f9are', '2024-03-23 20:30:46'),
('Name113', 113, 'email113@example.com', 1000000113, '$2y$10$McGVCf1NHPAxQ6a3rDURX.rhyKNA7F/9Qn3KiitU1dqX60/pHWJZK', '2024-03-23 20:30:46'),
('Name114', 114, 'email114@example.com', 1000000114, '$2y$10$GE98p3ReusRgp0TmokBcU.eabUpAPzYNypylcO2ifp0UnEml0W5Yi', '2024-03-23 20:30:46'),
('Name115', 115, 'email115@example.com', 1000000115, '$2y$10$fD/U4Acywvai7nk.nWVZoOO0Lhdz9OcHLNCux.mReYiGCxt.AaVjG', '2024-03-23 20:30:46'),
('Name116', 116, 'email116@example.com', 1000000116, '$2y$10$NFBaDktRntgEFklZP8NGs.2QVis9wwTkoHdWHohovNu4vlWizKSqa', '2024-03-23 20:30:46'),
('Name117', 117, 'email117@example.com', 1000000117, '$2y$10$uVtDr.X37kYgoIMHgfJzbe7oj8Kafl/6eejrAEQyS1L9CJhuxsSN2', '2024-03-23 20:30:46'),
('Name118', 118, 'email118@example.com', 1000000118, '$2y$10$jJ34Fjx5UliYFMX4uqKj4.WUg/UA3H37hdYHxKiXSfgbXVHyht1Pi', '2024-03-23 20:30:47'),
('Name119', 119, 'email119@example.com', 1000000119, '$2y$10$qhPRMzy9K1z1aVwrTZYxlerl4k8WoALXT/DQYhNwgwlRae.pS9Pvi', '2024-03-23 20:30:47'),
('Name120', 120, 'email120@example.com', 1000000120, '$2y$10$eGpo5iQNmd98pOE6sUL6V.7qHCu2U.6noD0U8Ave6YMaAdG9CfMke', '2024-03-23 20:30:47'),
('Name121', 121, 'email121@example.com', 1000000121, '$2y$10$uoW.iqxOtF/hnEe2yQQXd.rHrfzHKD.XeJtxcaTbTqURbKtVt4zkS', '2024-03-23 20:30:47'),
('Name122', 122, 'email122@example.com', 1000000122, '$2y$10$agtNk5GVIQt113Sjf7IDeOeCvB5eyMVeCnTkHTsywkBCrssHp2S02', '2024-03-23 20:30:47'),
('Name123', 123, 'email123@example.com', 1000000123, '$2y$10$yDaCtW6Id.GZojx3vG/mmOvoQ/0g/BWP1dramqln62ildGIwac7Uq', '2024-03-23 20:30:47'),
('Name124', 124, 'email124@example.com', 1000000124, '$2y$10$jhIfOayzRyuWqrLWOFaXpesjuPok/f0ZJoLfw9RW3HXWvdnr4IC6O', '2024-03-23 20:30:47'),
('Name125', 125, 'email125@example.com', 1000000125, '$2y$10$MtyvGKFkSP2XNSaxjyA3beOEfXGq4Dk70TJldmAPjs3HedwWla5X6', '2024-03-23 20:30:47'),
('Name126', 126, 'email126@example.com', 1000000126, '$2y$10$D59fwBld7J9hG8J3UIhG2.r4GK4htY2TaPefWXI5yv6mJBy3a8Rm6', '2024-03-23 20:30:47'),
('Name127', 127, 'email127@example.com', 1000000127, '$2y$10$RZqhlzKPBn88xWRxBl.eMeMH9jNlRMaSOuEeLXzYImUqJoXL18mb2', '2024-03-23 20:30:47'),
('Name128', 128, 'email128@example.com', 1000000128, '$2y$10$tgICL82u60JRq60Fa19C5edylva1QhmOVs8sqwyf82qf/cHAYR6rq', '2024-03-23 20:30:47'),
('Name129', 129, 'email129@example.com', 1000000129, '$2y$10$eFmaYruBOdoftbaE.X8UpOdwVH3rXvwvypmSghgAJxJGJ4nX7PVOS', '2024-03-23 20:30:47'),
('Name130', 130, 'email130@example.com', 1000000130, '$2y$10$B6QGF/AJUyBaTMknfi48Ju7T5v/8W8TdCXlnaGjsTl8rtL29utJJm', '2024-03-23 20:30:47'),
('Name131', 131, 'email131@example.com', 1000000131, '$2y$10$JaB/53n3C.2.bzZgbFGsHOPZ/jjIRJbjbBhDzJD86gTq76OUR3456', '2024-03-23 20:30:47'),
('Name132', 132, 'email132@example.com', 1000000132, '$2y$10$wjaqHKy4jAtzPBkrw3RTSuuxyRSkiDLFPDxhhyAMNk6pTtlkiSrW2', '2024-03-23 20:30:47'),
('Name133', 133, 'email133@example.com', 1000000133, '$2y$10$WmkhOLxNmC7eNQQEgQ2cq.mvOe8CpFP9/2bByYWdu8RG0UjCi4pYe', '2024-03-23 20:30:47'),
('Name134', 134, 'email134@example.com', 1000000134, '$2y$10$piUBexs2Le0nbFAOUcbktuYUBUKvxvcq910xzaXW0bYZdS6sphFVW', '2024-03-23 20:30:47'),
('Name135', 135, 'email135@example.com', 1000000135, '$2y$10$if64dLmXn7sKtMsdDGKNauvlNallYli8ifeBJWMPFW8.8ywmtbzqS', '2024-03-23 20:30:47'),
('Name136', 136, 'email136@example.com', 1000000136, '$2y$10$UMDCccIVzeI.DfowxKBjY.s5Mz5rztLj7GT4CGxkK2ocdd.GGaiue', '2024-03-23 20:30:48'),
('Name137', 137, 'email137@example.com', 1000000137, '$2y$10$B6/tP1iX5OoXjdZ.bfOEC.8OxN1ts3fxXKV/eVlMSBd.zsfu6Sn0y', '2024-03-23 20:30:48'),
('Name138', 138, 'email138@example.com', 1000000138, '$2y$10$wtihvKqr9j8RPmOiVlJ..uxD0qlBra4OIDytjmAVcQ/jSW7POkCge', '2024-03-23 20:30:48'),
('Name139', 139, 'email139@example.com', 1000000139, '$2y$10$kannAYFCfoHrm2UxxPDsLuB2C6EE8zdaE5nd2/AGXcj225CMjINzu', '2024-03-23 20:30:48'),
('Name140', 140, 'email140@example.com', 1000000140, '$2y$10$ekp5GrjiJIanx6LyBLKl6uPoivF5bT6uvumuztcBQjWRUsLYG8Nke', '2024-03-23 20:30:48'),
('Name141', 141, 'email141@example.com', 1000000141, '$2y$10$xMJhCvtAH4Mu4wmsVa20dOxC0OiEuCZPrgpUz1hSQrDXsgwvfgU1e', '2024-03-23 20:30:48'),
('Name142', 142, 'email142@example.com', 1000000142, '$2y$10$/YHYxQzi/SSi2fE.G1oNh.JqhtOgAztdjrp2G6D7KegLrSWj06Fpe', '2024-03-23 20:30:48'),
('Name143', 143, 'email143@example.com', 1000000143, '$2y$10$ZWPUH5JIoxSBE7yid9hNROMlDnejQhpPe1fWA2ygO1eVlCHaaTKY.', '2024-03-23 20:30:48'),
('Name144', 144, 'email144@example.com', 1000000144, '$2y$10$GHmKG3Zoo742xzyWoAJZLOoROR4vYYK6yewI0f1GAKjdhBt3k0BN.', '2024-03-23 20:30:48'),
('Name145', 145, 'email145@example.com', 1000000145, '$2y$10$YWO9SMVhs7cBlwrQaXHI0uJugditqH1ialr.mfS/wrDruIHBMQCme', '2024-03-23 20:30:48'),
('Name146', 146, 'email146@example.com', 1000000146, '$2y$10$nEwDwkSiPr2VXrXGuv0DHuPPdeTt7WP2w0u8GgvCsne6cfYNG96sm', '2024-03-23 20:30:48'),
('Name147', 147, 'email147@example.com', 1000000147, '$2y$10$wVG5Jev7FhRH5gZZrZ8/g.cFoiULudCCx6uYL6CuC7or2Yfjk9Sr.', '2024-03-23 20:30:48'),
('Name148', 148, 'email148@example.com', 1000000148, '$2y$10$N/E0hvXtlUzHBJtl540NEeZ0nhIAkbrioaYCOzMuNi7ZDnzyvANQu', '2024-03-23 20:30:48'),
('Name149', 149, 'email149@example.com', 1000000149, '$2y$10$b4hpUn7fSlIDPL3uKBhqcOH7FxTT7qq//CFgmp9se7lN9wFo33vi2', '2024-03-23 20:30:48'),
('Name150', 150, 'email150@example.com', 1000000150, '$2y$10$f9dcPoJtKb73BLjEwcWC4u9cJ042vDVT0zR3f84z4FNVJ60YJrNou', '2024-03-23 20:30:48'),
('Name151', 151, 'email151@example.com', 1000000151, '$2y$10$KeHPTu7v4rpV4x2DrTk88.FbHA/.Fr1ZdhMp71mtvAIN2ld/7nC3W', '2024-03-23 20:30:48'),
('Name152', 152, 'email152@example.com', 1000000152, '$2y$10$zsbn2p8m90xPEfmKgedfPeWGI9tIT/W5tvUXpU9EWpRlRvM3G57ly', '2024-03-23 20:30:48'),
('Name153', 153, 'email153@example.com', 1000000153, '$2y$10$WXkDMBZqiXvi.08ffTcoyuh0dR1dnml3Fq5eqGZDKWfmoPlRtHT3K', '2024-03-23 20:30:48'),
('Name154', 154, 'email154@example.com', 1000000154, '$2y$10$EkNaBY3O.amB2cprLxzsbe4zfZXghkRtmsjqdBj2lBmzysjpIHlVq', '2024-03-23 20:30:49'),
('Name155', 155, 'email155@example.com', 1000000155, '$2y$10$fYofUmtjvjQrxvThvhZeBeauhc0JZUOlEF1dMdhCu7oA1swqRuY3S', '2024-03-23 20:30:49'),
('Name156', 156, 'email156@example.com', 1000000156, '$2y$10$cmKh21minkFHAtqWAuDSj.vPxbSUjGHoZ8NiGIc7Goahfk/NJ69yW', '2024-03-23 20:30:49'),
('Name157', 157, 'email157@example.com', 1000000157, '$2y$10$qBf6iFoI7.zILRN1F/HTpeglvojqMcdpsocs8QptfvQPFHwVytcKy', '2024-03-23 20:30:49'),
('Name158', 158, 'email158@example.com', 1000000158, '$2y$10$vNJ8Gw8c/iFLvr/eGIMVaOG2ide1Nyl0Fgjua1jQJzFZN7Qd1ZG76', '2024-03-23 20:30:49'),
('Name159', 159, 'email159@example.com', 1000000159, '$2y$10$HOEqJ73FF3uNByvS0B3kz.zBaPvYpfTsMHP3XRac3eXAkgCA17M6e', '2024-03-23 20:30:49'),
('Name160', 160, 'email160@example.com', 1000000160, '$2y$10$icbafDIjDTWIaCKhw0Rf.e.abXNvDno3tVCvD3RajezWpew5GraBe', '2024-03-23 20:30:49'),
('Name161', 161, 'email161@example.com', 1000000161, '$2y$10$XiYRo5KfuHfVnGqiIBoi8uDhlRr7W06ii0dRGItqWAIO6JH8PYc.i', '2024-03-23 20:30:49'),
('Name162', 162, 'email162@example.com', 1000000162, '$2y$10$N9SFADSpeY7dWUFmUKuaguyceqTDhqfazIgAMLbDgMRawUGlH02PG', '2024-03-23 20:30:49'),
('Name163', 163, 'email163@example.com', 1000000163, '$2y$10$r08v655d9U9P1VAJ7M1f7ebgScI26np.7yCBaGHnj5bedDX5fqy2e', '2024-03-23 20:30:49'),
('Name164', 164, 'email164@example.com', 1000000164, '$2y$10$I26foJqFxjVsrIz06OonSuxRpbI/Bp6lRDDTCKsDfa6GnWMiflBhC', '2024-03-23 20:30:49'),
('Name165', 165, 'email165@example.com', 1000000165, '$2y$10$nWHRTbTYwVHosdw.NUgTfe0a9c8rxi/7r6srIk/gX.MIYS/h9QKCC', '2024-03-23 20:30:49'),
('Name166', 166, 'email166@example.com', 1000000166, '$2y$10$gCPJqJDgqbNwavoTjeKBJ./Yn9ji4g77OKJ974uz8b03nw5ikoGVO', '2024-03-23 20:30:49'),
('Name167', 167, 'email167@example.com', 1000000167, '$2y$10$d8KDgvvJA9I/MUCUzYNpG.mT7G7MoLnaHOnVPIIRqQWifQV/.yAIW', '2024-03-23 20:30:49'),
('Name168', 168, 'email168@example.com', 1000000168, '$2y$10$dHrLa0qM8OqeZL54rOLpIeB3xuqtI/tx.mEKcIi.LhctObrOOMogq', '2024-03-23 20:30:49'),
('Name169', 169, 'email169@example.com', 1000000169, '$2y$10$fMGUpyV0L58FswkE9qav1eSGoCO2h.CftRw/ux2aQgMCCPpGDIN2y', '2024-03-23 20:30:49'),
('Name170', 170, 'email170@example.com', 1000000170, '$2y$10$yaQ9/EEq5r1lYA3ojsjTTuOaLdeboqXVAEE8u59ANQaCSdbuT3IXG', '2024-03-23 20:30:49'),
('Name171', 171, 'email171@example.com', 1000000171, '$2y$10$9U5wYnU7wYYfZ6bjjRXvaesgkrZVdCCkgr1epLIs6HwbmGFzG9CF6', '2024-03-23 20:30:49'),
('Name172', 172, 'email172@example.com', 1000000172, '$2y$10$vTP02ZUzoOlvSGIYP4jzVepinDKEghxnBlQa5OEeQ05s6Fz4LbKwu', '2024-03-23 20:30:49'),
('Name173', 173, 'email173@example.com', 1000000173, '$2y$10$5nSU3ACRA3jRkMrAMZozbeGpDqqK9bUeR2T9nYV0q7a.LKQ7ZLJSy', '2024-03-23 20:30:50'),
('Name174', 174, 'email174@example.com', 1000000174, '$2y$10$MVz5ialzoKEKAoXsuikLUOXG3KmLPv5dOFZwIYnODppr4KAiE3z/S', '2024-03-23 20:30:50'),
('Name175', 175, 'email175@example.com', 1000000175, '$2y$10$T4XzqbhqRuuA6sm47fQR9.95thm9jZDy2xK4frcdtNqnDBkf.3ORi', '2024-03-23 20:30:50'),
('Name176', 176, 'email176@example.com', 1000000176, '$2y$10$mCYKwnI2xqBXhBvBAB0jHu6zWkHLPrz96ygSn56G.KxWDQezQaGma', '2024-03-23 20:30:50'),
('Name177', 177, 'email177@example.com', 1000000177, '$2y$10$.uojtbpnCpjSZwxGjgAsbuiYxWnH/u18.nkccw4isdZHGsbRFM3J6', '2024-03-23 20:30:50'),
('Name178', 178, 'email178@example.com', 1000000178, '$2y$10$WpREhT.BFfYUnhmKmbe/zuojksxZKgqhAqMWnZm2vXn2QDCQaMYVq', '2024-03-23 20:30:50'),
('Name179', 179, 'email179@example.com', 1000000179, '$2y$10$L/Y92VY98PRl087KOPKQZu4bTeAEReItqZeSz.LLJVJLOAsYipX16', '2024-03-23 20:30:50'),
('Name180', 180, 'email180@example.com', 1000000180, '$2y$10$q1YCnG/PmBc2Tl6ZSLAvLOUNE9qnfNoOg1wdrH.hyGCwd5DL.XErO', '2024-03-23 20:30:50'),
('Name181', 181, 'email181@example.com', 1000000181, '$2y$10$uATPMgNnYhDLOD4sjYHRwuVIVpwKhBLVQnTEKykdjUhiU3/2xxjCS', '2024-03-23 20:30:50'),
('Name182', 182, 'email182@example.com', 1000000182, '$2y$10$oCd5aIEyDwWKFFwCCFVchuGBn7be4m1cZjiruwJOmAZS0goQuhMB6', '2024-03-23 20:30:50'),
('Name183', 183, 'email183@example.com', 1000000183, '$2y$10$o2RQy.MrmVQzVEo2/3W94.fwfs4TKO58LCkODrJ9u2MgISU2ZX1ya', '2024-03-23 20:30:50'),
('Name184', 184, 'email184@example.com', 1000000184, '$2y$10$54k5Qnd7DPbu3V.3oIs6IuypDJbI5OhsZpB8q/4aPjW8aKzCMPFq6', '2024-03-23 20:30:50'),
('Name185', 185, 'email185@example.com', 1000000185, '$2y$10$QMloj8n4iOTBR2c4bezEhO4PIu9PucJGqGSp0rBJeuLbk11pWg7BC', '2024-03-23 20:30:50'),
('Name186', 186, 'email186@example.com', 1000000186, '$2y$10$UD3BM9xGj770Zi90NqwHDepAZPCRUhP8tMiL.AYO7/M9j42fiqQlm', '2024-03-23 20:30:50'),
('Name187', 187, 'email187@example.com', 1000000187, '$2y$10$9My6BwYP0tvyoDKfSzjlKe/b9rBjLHMeEHGzPwypNcijzbAqlVcNO', '2024-03-23 20:30:50'),
('Name188', 188, 'email188@example.com', 1000000188, '$2y$10$yk2w2iPLCVsr8qshpXloaeic4HCYCfAgJO4MhmE7HW3kaBgkQ3Ijy', '2024-03-23 20:30:50'),
('Name189', 189, 'email189@example.com', 1000000189, '$2y$10$TvaXX5vIYl7U8uDPmn7ZVuli2oetbacih/HKjJas8oBEaFvbJQfkO', '2024-03-23 20:30:50'),
('Name190', 190, 'email190@example.com', 1000000190, '$2y$10$122h9NYxYk3G1qBR8bXguOBsRNxQ/9hmkSLY0B6C2dM7fv.DCSo2.', '2024-03-23 20:30:50'),
('Name191', 191, 'email191@example.com', 1000000191, '$2y$10$/so6iy0T5uaT.NiYmPaYSOMdZerlErYrPJRcoSABV3tpAuem8XLfu', '2024-03-23 20:30:51'),
('Name192', 192, 'email192@example.com', 1000000192, '$2y$10$f6vJbp.IMlgfLPjApuJiceNscNUH/ZY7t.czvV8lX0x8jG7v4C2Z2', '2024-03-23 20:30:51'),
('Name193', 193, 'email193@example.com', 1000000193, '$2y$10$p243CVjEfhUa206mX0uVpO.ElloWIjpIxtFoYQqr8eFbR6pCueIsW', '2024-03-23 20:30:51'),
('Name194', 194, 'email194@example.com', 1000000194, '$2y$10$3TIjYJWYM0KgbKQa45hNdeKpuTOOGaRj4AYUlEIFPvGa8Ktlr785a', '2024-03-23 20:30:51'),
('Name195', 195, 'email195@example.com', 1000000195, '$2y$10$gMMwnP3aXokfSkKlUoAmfe.kBVW9sIPbBZH85iMifjVAiekv31pou', '2024-03-23 20:30:51'),
('Name196', 196, 'email196@example.com', 1000000196, '$2y$10$U4uD2XGsIsGKEDS9Rr/AJ.pJS0/2ZCAEl1t70UAGQoQyoeB63zb5u', '2024-03-23 20:30:51'),
('Name197', 197, 'email197@example.com', 1000000197, '$2y$10$HM2gLXsFQnEJHln8bcJbeuCLN1viVvGka4mVC43kXBufO2YfxiTHm', '2024-03-23 20:30:51'),
('Name198', 198, 'email198@example.com', 1000000198, '$2y$10$apcIS7ah4IBUUh9tFd0Wbue2oi5pZR5JvTfEeXUNXFYBFqEU7qlNW', '2024-03-23 20:30:51'),
('Name199', 199, 'email199@example.com', 1000000199, '$2y$10$ZH8U/NzasiPriLtpwR/mbef4uU2fjXLDiN1M4xp.0Ei1xwps1mgsO', '2024-03-23 20:30:51'),
('Name200', 200, 'email200@example.com', 1000000200, '$2y$10$nBLFVxfPWtlaDfOUugxxbeH1RXFCNn5Pdvdnpzad4efgQVfZmrM5K', '2024-03-23 20:30:51');

-- --------------------------------------------------------

--
-- Table structure for table `spms_student`
--

CREATE TABLE `spms_student` (
  `student_name` varchar(70) NOT NULL,
  `student_enrollment_number` int(11) NOT NULL,
  `student_email` varchar(120) NOT NULL,
  `student_personal_email` varchar(100) DEFAULT NULL,
  `student_phone_no` int(13) NOT NULL,
  `student_pasword` varchar(300) NOT NULL,
  `student_sign_up_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spms_student`
--

INSERT INTO `spms_student` (`student_name`, `student_enrollment_number`, `student_email`, `student_personal_email`, `student_phone_no`, `student_pasword`, `student_sign_up_time`) VALUES
('Name101', 101, 'email101@example.com', 'personal101@example.com', 1000000101, '$2y$10$EzGyuGYrGoav1LPQtjothOBETSf6Rmtqu3n/H6AfyRMdY/ZBNY.o2', '2024-03-23 20:30:46'),
('Name102', 102, 'email102@example.com', 'personal102@example.com', 1000000102, '$2y$10$WUa6AjfdJUtQiNbn740zt.VDbjGN/2w.I5UHUgnhH8B8TGboScae6', '2024-03-23 20:30:46'),
('Name103', 103, 'email103@example.com', 'personal103@example.com', 1000000103, '$2y$10$tkJLCpgYkkpS8uq1Azqmd.vxj9Ckh.O/sltDHoxZGv6PyfVVxLx9i', '2024-03-23 20:30:46'),
('Name104', 104, 'email104@example.com', 'personal104@example.com', 1000000104, '$2y$10$e4XJLLv33AeBRb19puIyJ.BkknbKLHp4Ag0QKZ7Mx3Pz0YIHSZIeq', '2024-03-23 20:30:46'),
('Name105', 105, 'email105@example.com', 'personal105@example.com', 1000000105, '$2y$10$7migAxTnPE4ktjXPNvmAxeuvRoFhA0GEneymDjBREvwljJFaS8S/m', '2024-03-23 20:30:46'),
('Name106', 106, 'email106@example.com', 'personal106@example.com', 1000000106, '$2y$10$1LNubyhFMmmV1E6JScN6a.m5.6Ip7tuqKIBqOh4CTcb.xoNClPsdi', '2024-03-23 20:30:46'),
('Name107', 107, 'email107@example.com', 'personal107@example.com', 1000000107, '$2y$10$UvumXLHa5soi/jLZGGwJoOKD8A1cer41xxcyq7ZxFwqAHL4oKAROe', '2024-03-23 20:30:46'),
('Name108', 108, 'email108@example.com', 'personal108@example.com', 1000000108, '$2y$10$yGYJfVexqX/kgOsQ2.MPr.l2G.M9b91iyUdMF6z8Q.USgjLLETuv2', '2024-03-23 20:30:46'),
('Name109', 109, 'email109@example.com', 'personal109@example.com', 1000000109, '$2y$10$iThr4gKVRaGanxqq5h3l7OMoZtpH0RdB8qid2Hhz/gVsY4Nh9nMhy', '2024-03-23 20:30:46'),
('Name110', 110, 'email110@example.com', 'personal110@example.com', 1000000110, '$2y$10$oes0ytJO/2b9noo86OazJOxifXDlIcfzsOSuVzx37/wMMUUUaOj4i', '2024-03-23 20:30:46'),
('Name111', 111, 'email111@example.com', 'personal111@example.com', 1000000111, '$2y$10$coBk68KkS9EqfUhFk7AtsuLMJdV6ksTLoZozc7Xkt89I9NlnD3NbS', '2024-03-23 20:30:46'),
('Name112', 112, 'email112@example.com', 'personal112@example.com', 1000000112, '$2y$10$b5t3WGIrJslcTHD4wDRqCu9u63AeLY7TtcZGgh3P5ap5YeK4f9are', '2024-03-23 20:30:46'),
('Name113', 113, 'email113@example.com', 'personal113@example.com', 1000000113, '$2y$10$McGVCf1NHPAxQ6a3rDURX.rhyKNA7F/9Qn3KiitU1dqX60/pHWJZK', '2024-03-23 20:30:46'),
('Name114', 114, 'email114@example.com', 'personal114@example.com', 1000000114, '$2y$10$GE98p3ReusRgp0TmokBcU.eabUpAPzYNypylcO2ifp0UnEml0W5Yi', '2024-03-23 20:30:46'),
('Name115', 115, 'email115@example.com', 'personal115@example.com', 1000000115, '$2y$10$fD/U4Acywvai7nk.nWVZoOO0Lhdz9OcHLNCux.mReYiGCxt.AaVjG', '2024-03-23 20:30:46'),
('Name116', 116, 'email116@example.com', 'personal116@example.com', 1000000116, '$2y$10$NFBaDktRntgEFklZP8NGs.2QVis9wwTkoHdWHohovNu4vlWizKSqa', '2024-03-23 20:30:46'),
('Name117', 117, 'email117@example.com', 'personal117@example.com', 1000000117, '$2y$10$uVtDr.X37kYgoIMHgfJzbe7oj8Kafl/6eejrAEQyS1L9CJhuxsSN2', '2024-03-23 20:30:46'),
('Name118', 118, 'email118@example.com', 'personal118@example.com', 1000000118, '$2y$10$jJ34Fjx5UliYFMX4uqKj4.WUg/UA3H37hdYHxKiXSfgbXVHyht1Pi', '2024-03-23 20:30:47'),
('Name119', 119, 'email119@example.com', 'personal119@example.com', 1000000119, '$2y$10$qhPRMzy9K1z1aVwrTZYxlerl4k8WoALXT/DQYhNwgwlRae.pS9Pvi', '2024-03-23 20:30:47'),
('Name120', 120, 'email120@example.com', 'personal120@example.com', 1000000120, '$2y$10$eGpo5iQNmd98pOE6sUL6V.7qHCu2U.6noD0U8Ave6YMaAdG9CfMke', '2024-03-23 20:30:47'),
('Name121', 121, 'email121@example.com', 'personal121@example.com', 1000000121, '$2y$10$uoW.iqxOtF/hnEe2yQQXd.rHrfzHKD.XeJtxcaTbTqURbKtVt4zkS', '2024-03-23 20:30:47'),
('Name122', 122, 'email122@example.com', 'personal122@example.com', 1000000122, '$2y$10$agtNk5GVIQt113Sjf7IDeOeCvB5eyMVeCnTkHTsywkBCrssHp2S02', '2024-03-23 20:30:47'),
('Name123', 123, 'email123@example.com', 'personal123@example.com', 1000000123, '$2y$10$yDaCtW6Id.GZojx3vG/mmOvoQ/0g/BWP1dramqln62ildGIwac7Uq', '2024-03-23 20:30:47'),
('Name124', 124, 'email124@example.com', 'personal124@example.com', 1000000124, '$2y$10$jhIfOayzRyuWqrLWOFaXpesjuPok/f0ZJoLfw9RW3HXWvdnr4IC6O', '2024-03-23 20:30:47'),
('Name125', 125, 'email125@example.com', 'personal125@example.com', 1000000125, '$2y$10$MtyvGKFkSP2XNSaxjyA3beOEfXGq4Dk70TJldmAPjs3HedwWla5X6', '2024-03-23 20:30:47'),
('Name126', 126, 'email126@example.com', 'personal126@example.com', 1000000126, '$2y$10$D59fwBld7J9hG8J3UIhG2.r4GK4htY2TaPefWXI5yv6mJBy3a8Rm6', '2024-03-23 20:30:47'),
('Name127', 127, 'email127@example.com', 'personal127@example.com', 1000000127, '$2y$10$RZqhlzKPBn88xWRxBl.eMeMH9jNlRMaSOuEeLXzYImUqJoXL18mb2', '2024-03-23 20:30:47'),
('Name128', 128, 'email128@example.com', 'personal128@example.com', 1000000128, '$2y$10$tgICL82u60JRq60Fa19C5edylva1QhmOVs8sqwyf82qf/cHAYR6rq', '2024-03-23 20:30:47'),
('Name129', 129, 'email129@example.com', 'personal129@example.com', 1000000129, '$2y$10$eFmaYruBOdoftbaE.X8UpOdwVH3rXvwvypmSghgAJxJGJ4nX7PVOS', '2024-03-23 20:30:47'),
('Name130', 130, 'email130@example.com', 'personal130@example.com', 1000000130, '$2y$10$B6QGF/AJUyBaTMknfi48Ju7T5v/8W8TdCXlnaGjsTl8rtL29utJJm', '2024-03-23 20:30:47'),
('Name131', 131, 'email131@example.com', 'personal131@example.com', 1000000131, '$2y$10$JaB/53n3C.2.bzZgbFGsHOPZ/jjIRJbjbBhDzJD86gTq76OUR3456', '2024-03-23 20:30:47'),
('Name132', 132, 'email132@example.com', 'personal132@example.com', 1000000132, '$2y$10$wjaqHKy4jAtzPBkrw3RTSuuxyRSkiDLFPDxhhyAMNk6pTtlkiSrW2', '2024-03-23 20:30:47'),
('Name133', 133, 'email133@example.com', 'personal133@example.com', 1000000133, '$2y$10$WmkhOLxNmC7eNQQEgQ2cq.mvOe8CpFP9/2bByYWdu8RG0UjCi4pYe', '2024-03-23 20:30:47'),
('Name134', 134, 'email134@example.com', 'personal134@example.com', 1000000134, '$2y$10$piUBexs2Le0nbFAOUcbktuYUBUKvxvcq910xzaXW0bYZdS6sphFVW', '2024-03-23 20:30:47'),
('Name135', 135, 'email135@example.com', 'personal135@example.com', 1000000135, '$2y$10$if64dLmXn7sKtMsdDGKNauvlNallYli8ifeBJWMPFW8.8ywmtbzqS', '2024-03-23 20:30:47'),
('Name136', 136, 'email136@example.com', 'personal136@example.com', 1000000136, '$2y$10$UMDCccIVzeI.DfowxKBjY.s5Mz5rztLj7GT4CGxkK2ocdd.GGaiue', '2024-03-23 20:30:48'),
('Name137', 137, 'email137@example.com', 'personal137@example.com', 1000000137, '$2y$10$B6/tP1iX5OoXjdZ.bfOEC.8OxN1ts3fxXKV/eVlMSBd.zsfu6Sn0y', '2024-03-23 20:30:48'),
('Name138', 138, 'email138@example.com', 'personal138@example.com', 1000000138, '$2y$10$wtihvKqr9j8RPmOiVlJ..uxD0qlBra4OIDytjmAVcQ/jSW7POkCge', '2024-03-23 20:30:48'),
('Name139', 139, 'email139@example.com', 'personal139@example.com', 1000000139, '$2y$10$kannAYFCfoHrm2UxxPDsLuB2C6EE8zdaE5nd2/AGXcj225CMjINzu', '2024-03-23 20:30:48'),
('Name140', 140, 'email140@example.com', 'personal140@example.com', 1000000140, '$2y$10$ekp5GrjiJIanx6LyBLKl6uPoivF5bT6uvumuztcBQjWRUsLYG8Nke', '2024-03-23 20:30:48'),
('Name141', 141, 'email141@example.com', 'personal141@example.com', 1000000141, '$2y$10$xMJhCvtAH4Mu4wmsVa20dOxC0OiEuCZPrgpUz1hSQrDXsgwvfgU1e', '2024-03-23 20:30:48'),
('Name142', 142, 'email142@example.com', 'personal142@example.com', 1000000142, '$2y$10$/YHYxQzi/SSi2fE.G1oNh.JqhtOgAztdjrp2G6D7KegLrSWj06Fpe', '2024-03-23 20:30:48'),
('Name143', 143, 'email143@example.com', 'personal143@example.com', 1000000143, '$2y$10$ZWPUH5JIoxSBE7yid9hNROMlDnejQhpPe1fWA2ygO1eVlCHaaTKY.', '2024-03-23 20:30:48'),
('Name144', 144, 'email144@example.com', 'personal144@example.com', 1000000144, '$2y$10$GHmKG3Zoo742xzyWoAJZLOoROR4vYYK6yewI0f1GAKjdhBt3k0BN.', '2024-03-23 20:30:48'),
('Name145', 145, 'email145@example.com', 'personal145@example.com', 1000000145, '$2y$10$YWO9SMVhs7cBlwrQaXHI0uJugditqH1ialr.mfS/wrDruIHBMQCme', '2024-03-23 20:30:48'),
('Name146', 146, 'email146@example.com', 'personal146@example.com', 1000000146, '$2y$10$nEwDwkSiPr2VXrXGuv0DHuPPdeTt7WP2w0u8GgvCsne6cfYNG96sm', '2024-03-23 20:30:48'),
('Name147', 147, 'email147@example.com', 'personal147@example.com', 1000000147, '$2y$10$wVG5Jev7FhRH5gZZrZ8/g.cFoiULudCCx6uYL6CuC7or2Yfjk9Sr.', '2024-03-23 20:30:48'),
('Name148', 148, 'email148@example.com', 'personal148@example.com', 1000000148, '$2y$10$N/E0hvXtlUzHBJtl540NEeZ0nhIAkbrioaYCOzMuNi7ZDnzyvANQu', '2024-03-23 20:30:48'),
('Name149', 149, 'email149@example.com', 'personal149@example.com', 1000000149, '$2y$10$b4hpUn7fSlIDPL3uKBhqcOH7FxTT7qq//CFgmp9se7lN9wFo33vi2', '2024-03-23 20:30:48'),
('Name150', 150, 'email150@example.com', 'personal150@example.com', 1000000150, '$2y$10$f9dcPoJtKb73BLjEwcWC4u9cJ042vDVT0zR3f84z4FNVJ60YJrNou', '2024-03-23 20:30:48'),
('Name151', 151, 'email151@example.com', 'personal151@example.com', 1000000151, '$2y$10$KeHPTu7v4rpV4x2DrTk88.FbHA/.Fr1ZdhMp71mtvAIN2ld/7nC3W', '2024-03-23 20:30:48'),
('Name152', 152, 'email152@example.com', 'personal152@example.com', 1000000152, '$2y$10$zsbn2p8m90xPEfmKgedfPeWGI9tIT/W5tvUXpU9EWpRlRvM3G57ly', '2024-03-23 20:30:48'),
('Name153', 153, 'email153@example.com', 'personal153@example.com', 1000000153, '$2y$10$WXkDMBZqiXvi.08ffTcoyuh0dR1dnml3Fq5eqGZDKWfmoPlRtHT3K', '2024-03-23 20:30:48'),
('Name154', 154, 'email154@example.com', 'personal154@example.com', 1000000154, '$2y$10$EkNaBY3O.amB2cprLxzsbe4zfZXghkRtmsjqdBj2lBmzysjpIHlVq', '2024-03-23 20:30:49'),
('Name155', 155, 'email155@example.com', 'personal155@example.com', 1000000155, '$2y$10$fYofUmtjvjQrxvThvhZeBeauhc0JZUOlEF1dMdhCu7oA1swqRuY3S', '2024-03-23 20:30:49'),
('Name156', 156, 'email156@example.com', 'personal156@example.com', 1000000156, '$2y$10$cmKh21minkFHAtqWAuDSj.vPxbSUjGHoZ8NiGIc7Goahfk/NJ69yW', '2024-03-23 20:30:49'),
('Name157', 157, 'email157@example.com', 'personal157@example.com', 1000000157, '$2y$10$qBf6iFoI7.zILRN1F/HTpeglvojqMcdpsocs8QptfvQPFHwVytcKy', '2024-03-23 20:30:49'),
('Name158', 158, 'email158@example.com', 'personal158@example.com', 1000000158, '$2y$10$vNJ8Gw8c/iFLvr/eGIMVaOG2ide1Nyl0Fgjua1jQJzFZN7Qd1ZG76', '2024-03-23 20:30:49'),
('Name159', 159, 'email159@example.com', 'personal159@example.com', 1000000159, '$2y$10$HOEqJ73FF3uNByvS0B3kz.zBaPvYpfTsMHP3XRac3eXAkgCA17M6e', '2024-03-23 20:30:49'),
('Name160', 160, 'email160@example.com', 'personal160@example.com', 1000000160, '$2y$10$icbafDIjDTWIaCKhw0Rf.e.abXNvDno3tVCvD3RajezWpew5GraBe', '2024-03-23 20:30:49'),
('Name161', 161, 'email161@example.com', 'personal161@example.com', 1000000161, '$2y$10$XiYRo5KfuHfVnGqiIBoi8uDhlRr7W06ii0dRGItqWAIO6JH8PYc.i', '2024-03-23 20:30:49'),
('Name162', 162, 'email162@example.com', 'personal162@example.com', 1000000162, '$2y$10$N9SFADSpeY7dWUFmUKuaguyceqTDhqfazIgAMLbDgMRawUGlH02PG', '2024-03-23 20:30:49'),
('Name163', 163, 'email163@example.com', 'personal163@example.com', 1000000163, '$2y$10$r08v655d9U9P1VAJ7M1f7ebgScI26np.7yCBaGHnj5bedDX5fqy2e', '2024-03-23 20:30:49'),
('Name164', 164, 'email164@example.com', 'personal164@example.com', 1000000164, '$2y$10$I26foJqFxjVsrIz06OonSuxRpbI/Bp6lRDDTCKsDfa6GnWMiflBhC', '2024-03-23 20:30:49'),
('Name165', 165, 'email165@example.com', 'personal165@example.com', 1000000165, '$2y$10$nWHRTbTYwVHosdw.NUgTfe0a9c8rxi/7r6srIk/gX.MIYS/h9QKCC', '2024-03-23 20:30:49'),
('Name166', 166, 'email166@example.com', 'personal166@example.com', 1000000166, '$2y$10$gCPJqJDgqbNwavoTjeKBJ./Yn9ji4g77OKJ974uz8b03nw5ikoGVO', '2024-03-23 20:30:49'),
('Name167', 167, 'email167@example.com', 'personal167@example.com', 1000000167, '$2y$10$d8KDgvvJA9I/MUCUzYNpG.mT7G7MoLnaHOnVPIIRqQWifQV/.yAIW', '2024-03-23 20:30:49'),
('Name168', 168, 'email168@example.com', 'personal168@example.com', 1000000168, '$2y$10$dHrLa0qM8OqeZL54rOLpIeB3xuqtI/tx.mEKcIi.LhctObrOOMogq', '2024-03-23 20:30:49'),
('Name169', 169, 'email169@example.com', 'personal169@example.com', 1000000169, '$2y$10$fMGUpyV0L58FswkE9qav1eSGoCO2h.CftRw/ux2aQgMCCPpGDIN2y', '2024-03-23 20:30:49'),
('Name170', 170, 'email170@example.com', 'personal170@example.com', 1000000170, '$2y$10$yaQ9/EEq5r1lYA3ojsjTTuOaLdeboqXVAEE8u59ANQaCSdbuT3IXG', '2024-03-23 20:30:49'),
('Name171', 171, 'email171@example.com', 'personal171@example.com', 1000000171, '$2y$10$9U5wYnU7wYYfZ6bjjRXvaesgkrZVdCCkgr1epLIs6HwbmGFzG9CF6', '2024-03-23 20:30:49'),
('Name172', 172, 'email172@example.com', 'personal172@example.com', 1000000172, '$2y$10$vTP02ZUzoOlvSGIYP4jzVepinDKEghxnBlQa5OEeQ05s6Fz4LbKwu', '2024-03-23 20:30:49'),
('Name173', 173, 'email173@example.com', 'personal173@example.com', 1000000173, '$2y$10$5nSU3ACRA3jRkMrAMZozbeGpDqqK9bUeR2T9nYV0q7a.LKQ7ZLJSy', '2024-03-23 20:30:50'),
('Name174', 174, 'email174@example.com', 'personal174@example.com', 1000000174, '$2y$10$MVz5ialzoKEKAoXsuikLUOXG3KmLPv5dOFZwIYnODppr4KAiE3z/S', '2024-03-23 20:30:50'),
('Name175', 175, 'email175@example.com', 'personal175@example.com', 1000000175, '$2y$10$T4XzqbhqRuuA6sm47fQR9.95thm9jZDy2xK4frcdtNqnDBkf.3ORi', '2024-03-23 20:30:50'),
('Name176', 176, 'email176@example.com', 'personal176@example.com', 1000000176, '$2y$10$mCYKwnI2xqBXhBvBAB0jHu6zWkHLPrz96ygSn56G.KxWDQezQaGma', '2024-03-23 20:30:50'),
('Name177', 177, 'email177@example.com', 'personal177@example.com', 1000000177, '$2y$10$.uojtbpnCpjSZwxGjgAsbuiYxWnH/u18.nkccw4isdZHGsbRFM3J6', '2024-03-23 20:30:50'),
('Name178', 178, 'email178@example.com', 'personal178@example.com', 1000000178, '$2y$10$WpREhT.BFfYUnhmKmbe/zuojksxZKgqhAqMWnZm2vXn2QDCQaMYVq', '2024-03-23 20:30:50'),
('Name179', 179, 'email179@example.com', 'personal179@example.com', 1000000179, '$2y$10$L/Y92VY98PRl087KOPKQZu4bTeAEReItqZeSz.LLJVJLOAsYipX16', '2024-03-23 20:30:50'),
('Name180', 180, 'email180@example.com', 'personal180@example.com', 1000000180, '$2y$10$q1YCnG/PmBc2Tl6ZSLAvLOUNE9qnfNoOg1wdrH.hyGCwd5DL.XErO', '2024-03-23 20:30:50'),
('Name181', 181, 'email181@example.com', 'personal181@example.com', 1000000181, '$2y$10$uATPMgNnYhDLOD4sjYHRwuVIVpwKhBLVQnTEKykdjUhiU3/2xxjCS', '2024-03-23 20:30:50'),
('Name182', 182, 'email182@example.com', 'personal182@example.com', 1000000182, '$2y$10$oCd5aIEyDwWKFFwCCFVchuGBn7be4m1cZjiruwJOmAZS0goQuhMB6', '2024-03-23 20:30:50'),
('Name183', 183, 'email183@example.com', 'personal183@example.com', 1000000183, '$2y$10$o2RQy.MrmVQzVEo2/3W94.fwfs4TKO58LCkODrJ9u2MgISU2ZX1ya', '2024-03-23 20:30:50'),
('Name184', 184, 'email184@example.com', 'personal184@example.com', 1000000184, '$2y$10$54k5Qnd7DPbu3V.3oIs6IuypDJbI5OhsZpB8q/4aPjW8aKzCMPFq6', '2024-03-23 20:30:50'),
('Name185', 185, 'email185@example.com', 'personal185@example.com', 1000000185, '$2y$10$QMloj8n4iOTBR2c4bezEhO4PIu9PucJGqGSp0rBJeuLbk11pWg7BC', '2024-03-23 20:30:50'),
('Name186', 186, 'email186@example.com', 'personal186@example.com', 1000000186, '$2y$10$UD3BM9xGj770Zi90NqwHDepAZPCRUhP8tMiL.AYO7/M9j42fiqQlm', '2024-03-23 20:30:50'),
('Name187', 187, 'email187@example.com', 'personal187@example.com', 1000000187, '$2y$10$9My6BwYP0tvyoDKfSzjlKe/b9rBjLHMeEHGzPwypNcijzbAqlVcNO', '2024-03-23 20:30:50'),
('Name188', 188, 'email188@example.com', 'personal188@example.com', 1000000188, '$2y$10$yk2w2iPLCVsr8qshpXloaeic4HCYCfAgJO4MhmE7HW3kaBgkQ3Ijy', '2024-03-23 20:30:50'),
('Name189', 189, 'email189@example.com', 'personal189@example.com', 1000000189, '$2y$10$TvaXX5vIYl7U8uDPmn7ZVuli2oetbacih/HKjJas8oBEaFvbJQfkO', '2024-03-23 20:30:50'),
('Name190', 190, 'email190@example.com', 'personal190@example.com', 1000000190, '$2y$10$122h9NYxYk3G1qBR8bXguOBsRNxQ/9hmkSLY0B6C2dM7fv.DCSo2.', '2024-03-23 20:30:50'),
('Name191', 191, 'email191@example.com', 'personal191@example.com', 1000000191, '$2y$10$/so6iy0T5uaT.NiYmPaYSOMdZerlErYrPJRcoSABV3tpAuem8XLfu', '2024-03-23 20:30:51'),
('Name192', 192, 'email192@example.com', 'personal192@example.com', 1000000192, '$2y$10$f6vJbp.IMlgfLPjApuJiceNscNUH/ZY7t.czvV8lX0x8jG7v4C2Z2', '2024-03-23 20:30:51'),
('Name193', 193, 'email193@example.com', 'personal193@example.com', 1000000193, '$2y$10$p243CVjEfhUa206mX0uVpO.ElloWIjpIxtFoYQqr8eFbR6pCueIsW', '2024-03-23 20:30:51'),
('Name194', 194, 'email194@example.com', 'personal194@example.com', 1000000194, '$2y$10$3TIjYJWYM0KgbKQa45hNdeKpuTOOGaRj4AYUlEIFPvGa8Ktlr785a', '2024-03-23 20:30:51'),
('Name195', 195, 'email195@example.com', 'personal195@example.com', 1000000195, '$2y$10$gMMwnP3aXokfSkKlUoAmfe.kBVW9sIPbBZH85iMifjVAiekv31pou', '2024-03-23 20:30:51'),
('Name196', 196, 'email196@example.com', 'personal196@example.com', 1000000196, '$2y$10$U4uD2XGsIsGKEDS9Rr/AJ.pJS0/2ZCAEl1t70UAGQoQyoeB63zb5u', '2024-03-23 20:30:51'),
('Name197', 197, 'email197@example.com', 'personal197@example.com', 1000000197, '$2y$10$HM2gLXsFQnEJHln8bcJbeuCLN1viVvGka4mVC43kXBufO2YfxiTHm', '2024-03-23 20:30:51'),
('Name198', 198, 'email198@example.com', 'personal198@example.com', 1000000198, '$2y$10$apcIS7ah4IBUUh9tFd0Wbue2oi5pZR5JvTfEeXUNXFYBFqEU7qlNW', '2024-03-23 20:30:51'),
('Name199', 199, 'email199@example.com', 'personal199@example.com', 1000000199, '$2y$10$ZH8U/NzasiPriLtpwR/mbef4uU2fjXLDiN1M4xp.0Ei1xwps1mgsO', '2024-03-23 20:30:51'),
('Name200', 200, 'email200@example.com', 'personal200@example.com', 1000000200, '$2y$10$nBLFVxfPWtlaDfOUugxxbeH1RXFCNn5Pdvdnpzad4efgQVfZmrM5K', '2024-03-23 20:30:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `spms_faculty`
--
ALTER TABLE `spms_faculty`
  ADD PRIMARY KEY (`faculty_id`),
  ADD UNIQUE KEY `faculty_email` (`faculty_email`);

--
-- Indexes for table `spms_parent`
--
ALTER TABLE `spms_parent`
  ADD PRIMARY KEY (`child_enrollement_number`),
  ADD UNIQUE KEY `parent_phone_number` (`parent_phone_number`),
  ADD UNIQUE KEY `parent_email` (`parent_email`);

--
-- Indexes for table `spms_student`
--
ALTER TABLE `spms_student`
  ADD PRIMARY KEY (`student_enrollment_number`),
  ADD UNIQUE KEY `student_phone_no` (`student_phone_no`),
  ADD UNIQUE KEY `student_personal_email` (`student_personal_email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
