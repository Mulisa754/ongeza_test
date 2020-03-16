<?php
include ('connection.php');

    class ongeza{

        //function that fetch all gender details from gender table and display it in dropdown text field
        public static function getGender($db){
            $sql = $db->query('SELECT * FROM gender');
            if($sql->num_rows >0){
                while($result = $sql->fetch_assoc()){?>
                    <option value="<?php echo $result['id']; ?>"><?php echo $result['gender_name']; ?></option>
                    <?php
                }
            }
        }

    //function that register customer this function is called in customer_process page
        public static function registerCustomer($db){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $tname = $_POST['tname'];
            $gender = $_POST['gender'];

            $customer = $db->query("INSERT INTO customer (first_name,last_name,town_name,gender_id) VALUES ('$fname','$lname','$tname','$gender')");
            if($customer){
                sleep(1);
                echo 'customersuccess';
            }else{
                sleep(1);
                echo 'customererror';
            }
        }

        //function that display customer details this function is executed in index.php page
        public static function viewcustomer($db){
            $get_customer = $db->query("SELECT customer.id, customer.first_name,customer.last_name, customer.town_name, gender.gender_name FROM customer INNER JOIN gender ON customer.gender_id = gender.id");
            if ($get_customer->num_rows >0){
                while($customer = $get_customer->fetch_assoc()){?>
                    <tr>
                        <td><?php echo $customer['id']; ?></td>
                        <td><?php echo $customer['first_name']; ?></td>
                        <td><?php echo $customer['last_name']; ?></td>
                        <td><?php echo $customer['town_name']; ?></td>
                        <td><?php echo $customer['gender_name']; ?></td>
                        <td style="white-space: nowrap;">
                            <a href="#" id="<?php echo $customer['id']; ?>" onclick="updateCustomer(this);" class="btn btn-success btn-sm" data-toggle="modal" data-target="#update-modal">Update <span class="fa fa-edit fa-fw"></span></a> |
                            <a href="#" id="<?php echo $customer['id']; ?>" onclick="deleteCustomer(this);" class="deletebtn btn btn-danger btn-sm">Delete <span class="fa fa-trash fa-fw"></span></a>
                        </td>
                    </tr>
                <?php
                }
            }
        }

        //function that delete customer details
        public static function deleteCustomer($db){
            $customer_id = $_GET['customer_id'];
            $delete_customer = $db->query("DELETE FROM customer WHERE id = '$customer_id'");
            if ($delete_customer){
                sleep(1);
                echo "customerdeleted";
            }else{
                sleep(1);
                echo "customernotdeleted";
            }
        }

        //function that get information for a single seleted customer
        public static function customerDetails($db){
            $customer_id = $_GET['id'];
            $details_customer = $db->query("SELECT customer.id, customer.first_name,customer.last_name, 
                                            customer.town_name, gender.id as genderId, gender.gender_name FROM customer
                                             INNER JOIN gender ON customer.gender_id = gender.id WHERE customer.id ='".$customer_id."'");
            if ($details_customer->num_rows >0){
                $results = $details_customer->fetch_assoc();
                echo json_encode($results);
            }
        }


        //function that update customer details
        public static function updateCustomer($db){
            $id     = $_POST['id'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $tname = $_POST['tname'];
            $gender = $_POST['gender'];

            $update_details = $db->query("UPDATE `customer` SET `first_name`='$fname'
                                    ,`last_name`='$lname',`town_name`='$tname',`gender_id`='$gender' WHERE id = '$id'");
            if ($update_details){
                sleep(1);
                echo 'updatesuccess';
            }else{
                sleep(1);
                echo 'updateerror';
            }
        }

    }
?>



