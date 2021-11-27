<html>
    <head>
        <title>Search module</title>
    </head>
    <body>
    <form action="search.php" method = "POST">
        <div class="form-group col-5">
        <label for="">Who's Required</label><br><br>
        <select class="form-control" name="profession" id="profession">
            <option value="none">Select Profession</option>
                    <option>DoorLock Breaking</option>
                    <option>Plumber</option>
                    <option>Mobile Repairer</option>
                    <option>Painting</option>
                    <option>Electrician</option>
                    <option>Inner Decorations</option>
                    <option>Water Heater</option>
                    <option>Hanging Lines</option>
                    <option>Blocked Sinks</option>
                    <option>Blocked Toilets</option>
                    <option>Showers</option>
                    <option>Wood Works</option>
                    <option>Metal Works</option>
        </select>
            </div>
                <input type="submit" name = "search" value = "Search">
            </form>
            <?php
                $conn = mysqli_connect("localhost", "root", "", "admin");
                
                if(isset($_POST['search']))
                {
                    $profession = $_POST['profession'];

                    $sql = "SELECT * FROM technician WHERE profession = '$profession'";

                    $result = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_array($result))
                    {
                        ?>

                        <form action="search.php" method = "POST">
                            <div class = "table-responsive">
            <table id="providers" class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Locaion</th>
                        <th>Profession</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                          <td><?php echo $row['name'];?></td>
                          <td><?php echo $row['location'];?></td>
                          <td><?php echo $row['profession'];?></td>
                      </tr>
                      </thead>
                <tbody>
                    <tr>
                        <td colspan='5'>Select location and profession..</td>
                    </tr>
                </tbody>
            </table>
            </div>
                        </form>

                        <?php
                    }
                }
            ?>
    </body>
</html>