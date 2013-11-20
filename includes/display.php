<?PHP
    require('./includes/logic.php');
    
    class gear {        
        public $icon;
        public $name;
        public $id;
        public $quality;    
        public $ilvl;
        public $source;
        public $tiered;
        public $stats;

        public function __construct($input) {            
            $this->icon = $input->{'icon'};
            $this->name = $input->{'name'};
            $this->id = $input->{'id'};
            $this->quality = $input->{'quality'};
            $this->ilvl = $input->{'itemLevel'};
            $this->source = source($this->ilvl);
            $this->tiered = is_setpiece($this->id);
            $this->stats = $input->{'stats'};
        }    

        public function show(){
            $icnurl="http://us.media.blizzard.com/wow/icons/56/";
            $wowheadurl="http://www.wowhead.com/item=".$this->id;
            $img=$icnurl.$this->icon.".jpg";
            echo "\t<img src=\"$img\">\n\t";
            echo "<a href=\"$wowheadurl\" rel=\"item-".$this->id."\">";
            echo $this->name." ".$this->ilvl;
            echo "</a><p style=\"font-variant:small-caps;\">";
            echo $this->source." ";
            if($this->tiered){echo "Tier piece";}
            echo "</p><br>\n";
        }
        
        public function show_stats(){                       
            echo "</br><table border=\"1\">";
            echo "<tr>";
            echo "<td>Stat</td>";
            echo "<td>Value</td>";
            echo "</tr>";            
            for ($i = 0; $i < count($this->stats); $i++) {
                echo "<tr>";
                echo "<td>";
                $b = $this->stats{$i}->{'stat'};
                echo stat_name($b);
                echo "</td>";
                echo "<td>";
                echo $this->stats{$i}->{'amount'}+$this->stats{$i}->{'reforgedAmount'};
                echo "</td>";
                echo "</tr>";
            }
        }
   }
   
   class gearset{
       public $back;      
       public $chest;
       public $feet;
       public $finger1;
       public $finger2;
       public $hands;
       public $legs;
       public $mainHand;
       public $neck;
       public $shoulder;
       public $trinket1;
       public $trinket2;
       public $waist;
       public $wrist;
       
       public function __construct($input) {            
            $this->back = new gear($input->{back});            
            $this->chest = new gear($input->{chest});
            $this->feet = new gear($input->{feet});
            $this->finger1 = new gear($input->{finger1});
            $this->finger2 = new gear($input->{finger2});
            $this->hands = new gear($input->{hands});
            $this->legs = new gear($input->{legs});
            $this->mainHand = new gear($input->{mainHand});
            $this->neck = new gear($input->{neck});
            $this->shoulder = new gear($input->{shoulder});
            $this->trinket1 = new gear($input->{trinket1});
            $this->trinket2 = new gear($input->{trinket2});
            $this->waist = new gear($input->{waist});
            $this->wrist = new gear($input->{wrist});
        }     
   }
   
   function source($ilvl){      
       switch($ilvl){
           case 608:
               return "Legendary";
           case 566:
               return "Heroic";
           case 561:
               return "Normal";
           case 553:
               return "Normal";
           case 548:
               return "Flex";
           case 544:
               return "Flex";
           case 543:
               return "Old HC";
           case 540:
               return "Flex";
           case 536: 
               return "LFR";
           case 530: 
               return "Old Normal";
           case 528: 
               return "LFR";
           default:
               return "N/A";               
       }
   }
  
   
   
   
?>