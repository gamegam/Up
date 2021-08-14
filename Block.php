<?php

/**
 * @name Block
 * @main Block\Blocksp
 * @author 플그러
 * @version 3.0.0
 * @api 3.0.0
*/

namespace Block;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Server;
use pocketmine\block\Block;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\level\Position;
use pocketmine\math\Vector3;

class Blocksp extends PluginBase implements Listener{
public function onEnable(){
$this->getServer()->getPluginManager()->registerEvents($this,$this);
 }
 
 public function BlockKd(\pocketmine\event\block\BlockBreakEvent $ev){
 $p = $ev->getPlayer();
 $name = $p->getName();
 $block = $ev->getBlock();
 $item = $p->getInventory()->getItemInHand();
 if ($p->isOP()){
 if($item->getId() == 345){
 $p->teleport(new Vector3($block->getX(), $block->getLevel()->getHighestBlockAt($block->getFloorX(), $block->getFloorZ()) + 1, $block->getZ()));
  $ev->setCancelled ();
  }
 }
}
  public function onToucsh(PlayerInteractEvent $ev){
  $p = $ev->getPlayer();
  $block = $ev->getBlock();
  $item = $p->getInventory()->getItemInHand();
  if ($p->isOP()){
  if($item->getId() == 345){
  if($ev->getAction() === PlayerInteractEvent::RIGHT_CLICK_AIR){
  $p->teleport(new Vector3($p->getX(), $p->getLevel()->getHighestBlockAt($p->getFloorX(), $p->getFloorZ()) + 1, $p->getZ()));
   $ev->setCancelled ();
   $p->sendMessage ("§d블럭 꼭지점으로 텔레포트했습니다");
   }else{
   $p->teleport(new Position(floatval($block->x), floatval($block->y) +1, floatval($block->z), $block->getLevel()));
    $ev->setCancelled ();
    $p->sendMessage ("§d이동중...");
    }
   }
  }
 }
}