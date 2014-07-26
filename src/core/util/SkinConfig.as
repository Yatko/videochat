/**
 * VIDEOSOFTWARE.PRO
 * Copyright 2011 videosoftware.pro
 * All Rights Reserved.
 *
 * You may NOT sell, resell or redistribute or otherwise make available this software or parts of its source code.
 * See the SVC- License for more details. You should have received a copy of the license along with this software.
 * If not, contact us at <http://www.videosoftware.pro/contact/>.
 */

package core.util {
	import flash.utils.getDefinitionByName;
	
	import style.common.skin.TransparentSkin;

	//plain
	import style.plain.skin.skinControlButton;
	import style.plain.skin.skinSVCButton;
	import style.plain.skin.skinTextInput;
	import style.plain.skin.focusSkinAnimatedArrow;
	import style.plain.skin.skinVideoBox;
	import style.plain.skin.skinVideoBoxSettings;
	
	//dark
	import style.dark.skin.skinControlButton;
	import style.dark.skin.skinSVCButton;
	import style.dark.skin.skinTextInput;
	import style.dark.skin.focusSkinAnimatedArrow;
	import style.dark.skin.skinVideoBox;
	import style.dark.skin.skinVideoBoxSettings;
	
	//light
	import style.light.skin.skinControlButton;
	import style.light.skin.skinSVCButton;
	import style.light.skin.skinTextInput;
	import style.light.skin.focusSkinAnimatedArrow;
	import style.light.skin.skinVideoBox;
	import style.light.skin.skinVideoBoxSettings;
	
	//glass
	import style.glass.skin.skinControlButton;
	import style.glass.skin.skinSVCButton;
	import style.glass.skin.skinTextInput;
	import style.glass.skin.focusSkinAnimatedArrow;
	import style.glass.skin.skinVideoBox;
	import style.glass.skin.skinVideoBoxSettings;
	
	//black
	import style.black.skin.skinControlButton;
	import style.black.skin.skinSVCButton;
	import style.black.skin.skinTextInput;
	import style.black.skin.focusSkinAnimatedArrow;
	import style.black.skin.skinVideoBox;
	import style.black.skin.skinVideoBoxSettings;
	
	//white
	import style.white.skin.skinControlButton;
	import style.white.skin.skinSVCButton;
	import style.white.skin.skinTextInput;
	import style.white.skin.focusSkinAnimatedArrow;
	import style.white.skin.skinVideoBox;
	import style.white.skin.skinVideoBoxSettings;
	
	//lab
	import style.lab.skin.skinControlButton;
	import style.lab.skin.skinSVCButton;
	import style.lab.skin.skinTextInput;
	import style.lab.skin.focusSkinAnimatedArrow;
	import style.lab.skin.skinVideoBox;
	import style.lab.skin.skinVideoBoxSettings;
	
	//lightBlue
	import style.lightBlue.skin.skinControlButton;
	import style.lightBlue.skin.skinSVCButton;
	import style.lightBlue.skin.skinTextInput;
	import style.lightBlue.skin.focusSkinAnimatedArrow;
	import style.lightBlue.skin.skinVideoBox;
	import style.lightBlue.skin.skinVideoBoxSettings;
	
	//crc
	import style.crc.skin.skinControlButton;
	import style.crc.skin.skinSVCButton;
	import style.crc.skin.skinTextInput;
	import style.crc.skin.focusSkinAnimatedArrow;
	import style.crc.skin.skinVideoBox;
	import style.crc.skin.skinVideoBoxSettings;
	
	public final class SkinConfig {
		
		/* Define the skin to be used by SVC - SKIN_STYLE:String = "[STYLENAME]"; */
		public static var SKIN_STYLE				:String = "plain";
		
		public static const COMMON_SKIN				:Class = getDefinitionByName("style.common.skin.TransparentSkin") as Class;
		public static const NEXT_BUTTON_SKIN		:Class = getDefinitionByName("style." + SKIN_STYLE + ".skin.skinControlButton") as Class;
		public static const SVC_BUTTON_SKIN			:Class = getDefinitionByName("style." + SKIN_STYLE + ".skin.skinSVCButton") as Class;
		public static const TEXT_INPUT_SKIN			:Class = getDefinitionByName("style." + SKIN_STYLE + ".skin.skinTextInput") as Class;
		public static const ANIMATED_ARROW_SKIN		:Class = getDefinitionByName("style." + SKIN_STYLE + ".skin.focusSkinAnimatedArrow") as Class;
		public static const VIDEO_BOX_SKIN			:Class = getDefinitionByName("style." + SKIN_STYLE + ".skin.skinVideoBox") as Class;
		public static const VIDEO_BOX_SETTINGS_SKIN	:Class = getDefinitionByName("style." + SKIN_STYLE + ".skin.skinVideoBoxSettings") as Class;
		
		
		private var _dummyCommonSkin				:TransparentSkin;
		
		private var _dummyPlainControlButton			:style.plain.skin.skinControlButton;
		private var _dummyPlainSVCButton				:style.plain.skin.skinSVCButton;
		private var _dummyPlainTextInput				:style.plain.skin.skinTextInput;
		private var _dummyPlainAnimatedArrow			:style.plain.skin.focusSkinAnimatedArrow;
		private var _dummyPlainVideoBox					:style.plain.skin.skinVideoBox;
		private var _dummyPlainVideoBoxSettings			:style.plain.skin.skinVideoBoxSettings;
		
		private var _dummyDarkControlButton				:style.dark.skin.skinControlButton;
		private var _dummyDarkSVCButton					:style.dark.skin.skinSVCButton;
		private var _dummyDarkTextInput					:style.dark.skin.skinTextInput;
		private var _dummyDarkAnimatedArrow				:style.dark.skin.focusSkinAnimatedArrow;
		private var _dummyDarkVideoBox					:style.dark.skin.skinVideoBox;
		private var _dummyDarkVideoBoxSettings			:style.dark.skin.skinVideoBoxSettings;
		
		private var _dummyLightControlButton			:style.light.skin.skinControlButton;
		private var _dummyLightSVCButton				:style.light.skin.skinSVCButton;
		private var _dummyLightTextInput				:style.light.skin.skinTextInput;
		private var _dummyLightAnimatedArrow			:style.light.skin.focusSkinAnimatedArrow;
		private var _dummyLightVideoBox					:style.light.skin.skinVideoBox;
		private var _dummyLightVideoBoxSettings			:style.light.skin.skinVideoBoxSettings;
		
		private var _dummyGlassControlButton			:style.glass.skin.skinControlButton;
		private var _dummyGlassSVCButton				:style.glass.skin.skinSVCButton;
		private var _dummyGlassTextInput				:style.glass.skin.skinTextInput;
		private var _dummyGlassAnimatedArrow			:style.glass.skin.focusSkinAnimatedArrow;
		private var _dummyGlassVideoBox					:style.glass.skin.skinVideoBox;
		private var _dummyGlassVideoBoxSettings			:style.glass.skin.skinVideoBoxSettings;
		
		private var _dummyBlackControlButton			:style.black.skin.skinControlButton;
		private var _dummyBlackSVCButton				:style.black.skin.skinSVCButton;
		private var _dummyBlackTextInput				:style.black.skin.skinTextInput;
		private var _dummyBlackAnimatedArrow			:style.black.skin.focusSkinAnimatedArrow;
		private var _dummyBlackVideoBox					:style.black.skin.skinVideoBox;
		private var _dummyBlackVideoBoxSettings			:style.black.skin.skinVideoBoxSettings;
		
		private var _dummyWhiteControlButton			:style.white.skin.skinControlButton;
		private var _dummyWhiteSVCButton				:style.white.skin.skinSVCButton;
		private var _dummyWhiteTextInput				:style.white.skin.skinTextInput;
		private var _dummyWhiteAnimatedArrow			:style.white.skin.focusSkinAnimatedArrow;
		private var _dummyWhiteVideoBox					:style.white.skin.skinVideoBox;
		private var _dummyWhiteVideoBoxSettings			:style.white.skin.skinVideoBoxSettings;
		
		private var _dummyLabControlButton				:style.lab.skin.skinControlButton;
		private var _dummyLabSVCButton					:style.lab.skin.skinSVCButton;
		private var _dummyLabTextInput					:style.lab.skin.skinTextInput;
		private var _dummyLabAnimatedArrow				:style.lab.skin.focusSkinAnimatedArrow;
		private var _dummyLabVideoBox					:style.lab.skin.skinVideoBox;
		private var _dummyLabVideoBoxSettings			:style.lab.skin.skinVideoBoxSettings;
		
		private var _dummyLightBlueSkinControlButton	:style.lightBlue.skin.skinControlButton;
		private var _dummyLightBlueSkinSVCButton		:style.lightBlue.skin.skinSVCButton;
		private var _dummyLightBlueSkinTextInput		:style.lightBlue.skin.skinTextInput;
		private var _dummyLightBlueAnimatedArrow		:style.lightBlue.skin.focusSkinAnimatedArrow;
		private var _dummyLightBlueSkinVideoBox			:style.lightBlue.skin.skinVideoBox;
		private var _dummyLightBlueSkinVideoBoxSettings	:style.lightBlue.skin.skinVideoBoxSettings;
		
		private var _dummyCrcSkinControlButton			:style.crc.skin.skinControlButton;
		private var _dummyCrcSkinSVCButton				:style.crc.skin.skinSVCButton;
		private var _dummyCrcSkinTextInput				:style.crc.skin.skinTextInput;
		private var _dummyCrcAnimatedArrow				:style.crc.skin.focusSkinAnimatedArrow;
		private var _dummyCrcSkinVideoBox				:style.crc.skin.skinVideoBox;
		private var _dummyCrcSkinVideoBoxSettings		:style.crc.skin.skinVideoBoxSettings;
			
	}
}