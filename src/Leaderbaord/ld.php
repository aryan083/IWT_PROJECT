<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <style>
        /* Scrollbar styles */
        .other-players::-webkit-scrollbar {
            width: 8px;
            background-color: #f1f1f1;
        }
      
        .other-players::-webkit-scrollbar-thumb {
            background-color: #6da9e9;
            border-radius: 10px;
        }
      
        .other-players::-webkit-scrollbar-track {
            background-color: #f1f1f1;
            border-radius: 10px;
        }
      
        /* Player box styles */
        .player-box {
            background-color: #fff;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 5px;
            transition: background-color 0.3s ease;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
      
        .player-box:hover {
            background-color: #f0f0f0;
        }
      
        .player-box span {
            display: block;
            margin-bottom: 5px;
            color: #142d5a; /* Dark blue text color */
            transition: color 0.3s ease;
        }
      
        .player-box:hover span {
            color: #6da9e9; /* Light blue text color on hover */
        }
    </style>
</head>
<body>
    <?php
      
        // Query to fetch leaderboard data
        $sql = "SELECT name, COUNT(id) AS project_count, RANK() OVER (ORDER BY COUNT(id) DESC) AS player_rank FROM spms_projects GROUP BY name";
        $result = $conn->query($sql);
    ?>

    <div class="leaderboard-section" style="text-align: center; padding: 40px; border-radius: 20px; box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2); position: relative; overflow: hidden;">
        <div class="outer-container" style="background-color: #6da9e9; border-radius: 50%; width: 300px; height: 300px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: -1;"></div>
        <div class="inner-container" style="background-color: #fff; border-radius: 20px; padding: 40px; position: relative; z-index: 1;">
            <div class="new-inner-box" style="background-color: #6da9e9; border-radius: 20px; padding: 20px; position: relative; z-index: 1;">
                <h2>Leaderboard</h2>
                <div class="top-3" style="display: flex; justify-content: center; align-items: center; margin-bottom: 40px;">
                    <?php
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $player_name = $row["name"];
                                $project_count = $row["project_count"];
                                $player_rank = $row["player_rank"];

                                echo '<div class="top-player" style="margin-right: 80px;">';
                                echo '<img src="silver_trophy_icon.png" alt="Silver Trophy" style="width: 60px; height: 60px; color: #000000; margin-bottom: 10px;">';
                                echo '<div class="round-image" style="background-color: #c0c0c0; border-radius: 50%; border: 3px solid #fff; width: 150px; height: 150px; display: inline-block;">';
                                echo '<img src="player1.jpg" alt="' . $player_name . '" style="border-radius: 50%; width: 100%; height: 100%;">';
                                echo '</div>';
                                echo '<p style="margin-top: 5px;color: #000000">' . $player_name . '</p>';
                                echo '</div>';
                            }
                        } else {
                            echo "0 results";
                        }

                        // Close connection
                        $conn->close();
                    ?>
                </div>
                <div class="other-players" style="text-align: left; max-height: 200px; overflow-y: auto;">
                    <h3>Other Players</h3>
                    <div class="player-box" style="background-color: #fff; border-radius: 5px; padding: 10px; margin-bottom: 5px;">
                        <span style="float: left;">Player 4</span>
                        <span style="float: right;">Rank: 4</span>
                    </div>
                    <div class="player-box" style="background-color: #fff; border-radius: 5px; padding: 10px; margin-bottom: 5px;">
                        <span style="float: left;">Player 5</span>
                        <span style="float: right;">Rank: 5</span>
                    </div>
                    <div class="player-box" style="background-color: #fff; border-radius: 5px; padding: 10px; margin-bottom: 5px;">
                        <span style="float: left;">Player 6</span>
                        <span style="float: right;">Rank: 6</span>
                    </div>
                    <!-- Add more players as needed -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>
