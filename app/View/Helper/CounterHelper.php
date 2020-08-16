 <?php
	/**
	*@ Counter Website static
	*@ Helper for CakePHP Framework
	*@ Author : NiceIT - contact : tuantinhoc@yahoo.com
	*
	* Prepair Data Model For Helper. Create db table with structure below
	* @ DB Table : counters => Model : Counter => file : Counter.php
	* @ Fields :
	* @ => id - int, primary key auto_increment
	* @ => IP - varchar(20)
	* @ => time - varchar(11)
	* @ => date_visit (50)
	*/

    class CounterHelper extends HtmlHelper{

        //IP FROM USER
        public $IP;

        //User Online
        public $User_Online;

        //Total today
        public $Total_Today;

        //Total yesterday
        public $Total_Yesterday;

        //Total Previous Month
        public $Total_Mon_Prev;

        //Total This Month
        public $Total_Month;

        //Total Hits
        public $Total_Hits;

        //Timeout
        public $TimeOut;

        //Time now
        public $Time;

        //Init Model
        public $Model;

        function _constructDB(){

            /*
            *@ Init model for this helper
            */
            $counterDB = ClassRegistry::init('Counter');

            //Set model to class's variable
            $this->Model = $counterDB;

            /*
            *@ Set user IP and time out expired
            */
            $this->IP = $_SERVER['REMOTE_ADDR'];
            $this->TimeOut = 15;//Every 15 minutes update


            /*
            *@ Get now time and set it to class's variable
            */
            $time = getdate();
            $this->Time = $time;

            /*
            *@ Call Counter's functions
            */
            $this->UserRequest();
            $this->GetDetail();
            $this->ShowDetail();
        }


        //Call function for user request server
        public function UserRequest(){

            /*
            *@ If IP already set
            */
            $user = $this->Model->find("first", array(
                'conditions' => array('ip' => $this->IP),
                'order' => 'id DESC'
            ));
            if ( !empty($user) ){

                //Get log detail for this user in database


                //Get time
                $newTime = $this->Time['hours']*60 + $this->Time['minutes'];

                /*
                *@ If time larger than timeout, set new log
                */
                $temp = explode("/", $user['Counter']['date_visit']);
                if ( ( $newTime - $user['Counter']['time'] ) > $this->TimeOut || $temp[0] < $this->Time['mday'] || $temp[1] < $this->Time['mon']) {

                    //More than Timeout minutes since user visited
                    $this->request->data['ip'] = $this->IP;
                    $this->request->data['time'] = $this->Time['hours']*60 + $this->Time['minutes'];
                    $this->request->data['date_visit'] = $this->Time['mday'] . "/" . $this->Time['mon'] . "/" . $this->Time['year'];


                    //Store new log into database
                    $this->Model->create();
                    $this->Model->save($this->request->data);
                }
            }
            else{
                //Update new request->data to DB
                $this->request->data['ip'] = $this->IP;
                $this->request->data['time'] = $this->Time['hours']*60 + $this->Time['minutes'];
                $this->request->data['date_visit'] = $this->Time['mday'] . "/" . $this->Time['mon'] . "/" . $this->Time['year'];

                $this->Model->create();
                $this->Model->save($this->request->data);
            }
        }

        //Get detail log static for website
        public function GetDetail(){
            $data = $this->Model->find("all");
            $newTime = $this->Time['hours']*60 + $this->Time['minutes'];

            /*
            *@ Get detail static
            */

            //Set some temp variable to count

            $this_month = $this->Time['mon'];
            $this_date = $this->Time['mday'];

            //Set all to zero
            $this->User_Online = 0;
            $this->Total_Today = 0;
            $this->Total_Yesterday = 0;
            $this->Total_Mon_Prev = 0;
            $this->Total_Month = 0;

            //Start get detail
            foreach ( $data as $value ){
                $temp = explode ("/", $value['Counter']['date_visit']);
                if ( $temp[0] == $this->Time['mday'] && $temp[1] == $this->Time['mon'] ){
                    //Get user online
                    if ( $newTime - $value['Counter']['time'] < $this->TimeOut )
                        ++$this->User_Online;
                }

                if ( $this->Time['year'] == $temp[2] ){

                    //Get today static
                    if ( $this_date == $temp[0] )
                        ++$this->Total_Today;

                    //Get this month static
                    if ( $this_month == $temp['1'] )
                        ++$this->Total_Month;
                }

            }

            //For previous

            $prev_date = $this->Time['mday'] - 1;
            $prev_mon = $this->Time['mon'] - 1;

            if ( $prev_date < 1){
                $prev_date = 30;
                $prev_mon -= 1;
            }

            if ( $prev_mon < 1)
                $prev_mon = 12;

            foreach ($data as $value){
                $temp = explode ("/", $value['Counter']['date_visit']);

                if ( $this->Time['year'] == $temp[2] ){
                    if ( $prev_date == $temp[0] )
                        ++$this->Total_Yesterday;
                    if ( $prev_mon == $temp['1'] )
                        ++$this->Total_Mon_Prev;
                }
            }

            $this->Total_Hits = $this->Model->find("count");
        }

        //Show detail static for website
        public function ShowDetail(){
            echo "<ul class='news access'>";
                //echo "<li id='ip'><label>Your IP : </label> " . $this->IP . "</li>";
                echo "<li><label>Online : </label><span class=\"bold\"> " . $this->User_Online . "</span></li>";
                echo "<li><label>Hôm nay : </label> <span class=\"bold\">" . $this->Total_Today . "</span></li>";
                echo "<li><label>Hôm qua : </label><span class=\"bold\"> " . $this->Total_Yesterday . "</span></li>";
                echo "<li><label>Trong tháng : </label> <span class=\"bold\">" . $this->Total_Month . "</span></li>";
                /* echo "<li id='prev_mon'>Previous month : " . $this->Total_Mon_Prev . "</li>"; */
                echo "<li id=\"sum-access\"><label>Tổng : </label> <span class=\"bold\">" . $this->Total_Hits . "</span></li>";
            echo "</ul>";
        }

    }

?>