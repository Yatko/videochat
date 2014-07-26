/**
* VIDEOSOFTWARE.PRO
* Copyright 2011 videosoftware.pro
* All Rights Reserved.
*
* You may NOT sell, resell or redistribute or otherwise make available this software or parts of its source code.
* See the SVC- License for more details. You should have received a copy of the license along with this software.
* If not, contact us at <http://www.videosoftware.pro/contact/>.
*/

import components.SingleRandom.RemoteCamera;
import components_single.controller.VideoChatSingleController;

import core.util.Common;
import core.util.Config;
import core.util.SkinConfig;

import mx.resources.ResourceManager;
import mx.rpc.events.ResultEvent;
import mx.utils.ObjectUtil;


public var controller:VideoChatSingleController = new VideoChatSingleController();

private function preinit():void {
	configHttpService.send();
}
private function init():void {
	
	this.setStyle("skinClass", SkinConfig.COMMON_SKIN);
	chatOutput.setStyle("focusSkin", SkinConfig.ANIMATED_ARROW_SKIN);
	chatInput.setStyle("skinClass", SkinConfig.TEXT_INPUT_SKIN);
	chatInput.setStyle("focusSkin", SkinConfig.ANIMATED_ARROW_SKIN);
	creditButton.setStyle("skinClass", SkinConfig.SVC_BUTTON_SKIN);
	findNextButton.setStyle("skinClass", SkinConfig.NEXT_BUTTON_SKIN);
	
	controller.remote_camera_class = RemoteCamera;
	controller.loader = loader;
	controller.statusLabel = statusLabel;
	controller.chatOutput = chatOutput;
	controller.chatInput = chatInput;
	controller.remoters = remoters;
	controller.findNextButton = findNextButton;
	controller.init();
}
private function complete():void {
	controller.complete();
}

private function getConfig(event:ResultEvent):void {
	var language:String = (event.result["config"]["language"] as String);
	var skin:String = (event.result["config"]["skin"] as String);
	var serviceURL:String = (event.result["config"]["serviceURL"] as String);
	var configURL:String = (event.result["config"]["configURL"] as String);
	
	if ( language ) {
		ResourceManager.getInstance().localeChain = [language];
		ResourceManager.getInstance().update();
	}
	
	if ( skin ) {
		SkinConfig.SKIN_STYLE = skin;
	} else {
		SkinConfig.SKIN_STYLE = "plain";
	}
	
	if ( serviceURL ) {
		Config.WEB_SERVICE_URL = serviceURL;
	} else {
		//TODO
	}
	
	if ( configURL ) {
		Config.WEB_SERVICE_CONFIG_URL = configURL;
	} else {
		//TODO
	}
	
	init();
	complete();
}
