<?php
	class MenuCME{
		public function run($file, $permisos){
			include_once('simple_html_dom.php');
			$menu_completo = file_get_html($file);
			$parsedMenu = new ParsedMenu();
			foreach($menu_completo->find('ul') as $ul){ //parsea todo el menu
				if(in_array('main-menu', explode(' ', $ul->class))){ //encontro menu principal
					$parsedMenu->createMainMenu($ul->class);
					$level = 0;
				}else{
					$parsedMenu->createSubMenu($ul->id, $ul->class);
					$level = 1;
				}
				$index = 1;
				if($level==0){ //elementos del menu principal
					foreach($ul->find('li') as $li){
						$parsedMenu->addMainElement($index, $li->class, $li->id, $li->name, $li->href, $li->plaintext);
						$index++;
					}
				}else{
					foreach($ul->find('li') as $li){
						$parsedMenu->addSubElement($ul->id, $index, $li->class, $li->id, $li->name, $li->href, $li->plaintext);
						$index++;
					}
				}
			}

			if($permisos=="all"){
				$main_menu = $parsedMenu->buildMenu($parsedMenu->fullmenu['MainMenu'],$parsedMenu->fullmenu['MainElement']);
				$submenus = $parsedMenu->buildSubMenuTree($parsedMenu->fullmenu['SubMenu'],$parsedMenu->fullmenu['SubElement']);
				$out = "<div class=\"menu-trigger\"></div>\n" .$main_menu . $submenus;
			}else{
				$newmenu = array();
				$newmenu["MainMenu"] = $parsedMenu->fullmenu['MainMenu'];

				$newmainelement = sanitizeElements($parsedMenu->fullmenu['MainElement'], $permisos);
				$newsubelement = array_filter(sanitizeMenu($parsedMenu->fullmenu['SubElement'], $permisos)); //1
				$newsubmenu = array_intersect_key($parsedMenu->fullmenu['SubMenu'], array_flip(array_keys($newsubelement))); //2	
				$mainelements_cleankeys = array_map("getParentid", array_keys($newsubmenu));
				$newmainelement_clean = array_filter($newmainelement, function($array) use ($mainelements_cleankeys) { return useMainElement($array, $mainelements_cleankeys); } );

				$newmenu["MainElement"] = $newmainelement_clean;
				$newmenu["SubMenu"] = $newsubmenu;
				$newmenu["SubElement"] = $newsubelement;

				$main_menu = $parsedMenu->buildMenu($newmenu['MainMenu'],$newmenu["MainElement"]);
				$submenus = $parsedMenu->buildSubMenuTree($newmenu["SubMenu"],$newmenu["SubElement"]);
				$out = "<div class=\"menu-trigger\"></div>\n" .$main_menu . $submenus;
			}
			return $out;		
		}
	}//class menucme

	class ParsedMenu{
		var $fullmenu = array();

		function createMainMenu($class){
			if(!isset($this->fullmenu["MainMenu"])){
				$this->fullmenu["MainMenu"]["OpTag"] = "<ul class=\"" . $class . "\">";
			}
		}

		function createSubMenu($id, $class){
			$this->fullmenu["SubMenu"][$id]["OpTag"] = "<ul id=\"". $id . "\" class=\"" . $class . "\">";
		}		

		function addMainElement($index, $class, $id, $name, $href, $text){
			$this->fullmenu["MainElement"][$index]["class"] = $class;
			$this->fullmenu["MainElement"][$index]["text"] = $text;
			if(!empty($id)){
				$this->fullmenu["MainElement"][$index]["id"] = $id;
			}
			if(!empty($name)){
				$this->fullmenu["MainElement"][$index]["name"] = $name;
			}
			if(!empty($href)){
				$this->fullmenu["MainElement"][$index]["href"] = $href;
			}
		}

		function addSubElement($parentid, $index, $class, $id, $name, $href, $text){
			$this->fullmenu["SubElement"][$parentid][$index]["class"] = $class;
			$this->fullmenu["SubElement"][$parentid][$index]["text"] = $text;
			if(!empty($id)){
				$this->fullmenu["SubElement"][$parentid][$index]["id"] = $id;
			}
			if(!empty($name)){
				$this->fullmenu["SubElement"][$parentid][$index]["name"] = $name;
			}
			if(!empty($href)){
				$this->fullmenu["SubElement"][$parentid][$index]["href"] = $href;
			}
		}

		function buildliTree($array){
			$tree = "";
			foreach($array as $element){
				$li = "";
				$li .= "<li class=\"" . $element['class'] . "\"" . (array_key_exists('id', $element) ? " id=\"" . $element['id'] . "\">" : ">");
				$li .= $element['text'] . "</li>";
				if(array_key_exists('href', $element)){ //hay link
					$li = "<a href=\"" . $element['href'] . "\">" . $li . "</a>";
				}
				$tree .= "\n\t" . $li;
			}
			return $tree;
		}

		function buildMenu($Menu, $Element){
			$menu = "";
			$menu .= $Menu['OpTag'];
			$tree = $this->buildliTree($Element);
			$menu .= $tree . "\n</ul>\n";
			return $menu;
		}


		function buildSubMenuTree($SubMenu, $SubElement){
			$tree = "";
			foreach($SubMenu as $key=>$value){
				$tree .= $this->buildMenu($value, $SubElement[$key]);
			}
			return $tree;
		}		
	}//class ParseMenu

	function isAllowed($element, $permisos){
		if (array_key_exists('name', $element)){
			if(in_array($element['name'], $permisos)){
				return true;
			}else{
				return false;
			}
		}else{
			return true;
		}
	}

	function sanitizeElements($elements, $permisos){
		return array_filter($elements, function($array) use ($permisos) { return isAllowed($array, $permisos); } );			
	}

	function sanitizeMenu($menu, $permisos){
		$newmenu = array();
		foreach($menu as $key => $elements ){
			$newmenu[$key] = sanitizeElements($elements, $permisos);
		}
		return $newmenu;
	}

	function getParentid($element){
		return str_replace("-child","",$element);
	}

	function useMainElement($element,$keys){
		if (array_key_exists('id', $element)){
			if(in_array($element['id'], $keys)){
					return true;
				}else{
					return false;
				}
		}else{
			return true;
		}
	}	
?>

