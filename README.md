# Dokuwiki Kiwiki Theme

Flex theme with lots of css fix and some ease of use features. You can change all colors of the theme to your own taste.
Templage page on Dokuwiki : https://www.dokuwiki.org/template:kiwiki

### 2024-05-13
- Fix: php warning errors on non existing variables https://github.com/nicolasprigent/Dokuwiki-Kiwiki-Theme/issues/16
- Refactoring of the edit icon button for it to use the correct dokuwiki classes (Menu and MenuItem), and get the same authorizations than the default edit page link. https://github.com/nicolasprigent/Dokuwiki-Kiwiki-Theme/issues/23
  
### 2024-02-26
- Fix: edit_page button break when userewrite and useslash config enabled. Thanks to @AzurCrystal
- Fix : long links overflow on mobile view. Thanks to @Gabe-LSN

### 2024-01-27
- Added max height for left menu

### 2024-01-16
- Added Chinese language. Thanks to @AzurCrystal

### 2024-01-10
- Added css for tables in content
  
### 2023-11-27
- Updated editor css for readability

### 2023-11-23
- The edit button was limited to admin group only, now it checks edit permissions
  
### 2023-11-06
- Fix on mobile menu switch not hiding navigation menu on mobile if translation plugin is activated

### 2023-10-19 (features suggestions from @Chris75forumname -> https://github.com/nicolasprigent/Dokuwiki-Kiwiki-Theme/issues/12)
- Added go to bottom button with option to activate it or not
- Added fullscreen button in header
- Added connected user information on footer, with option to activate it or not
- Added ACL informations on footer (only for editors), with option to activate it or not
- Added ACL group list in user page has an info 

### 2023-10-18
- Added back the message area on connection page

### 2023-10-12
- Added max height for table of content in theme configuration

### 2023-10-02
- Bug fix on menu disappearing on deep level pages

### 2023-09-31
- Added compatibility with Translation Plugin
  
### 2023-09-01
- Updated css to have the filters working on small size screens

### 2023-07-25
- new language Added German language - Thanks to @holisticagile
  
### 2023-07-23
- Fixed issue about public wikis getting no header
- Added back to home link on login page
- Some css fixes on login page

### 2023-07-02
- New style parameter for changing header color

### 2023-06-21
- CSS fix for dark mode
- Default style.ini adjusted on some colors
  
### 2023-06-19
- CSS fixes on the extension manager page
- New screenshots to show the theme light/dark mode switcher
- Restored functionnality to change the logo (as described here : https://www.dokuwiki.org/template:dokuwiki#changing_the_logo)

### 2023-06-16
- Added light/dark theme mode, with separated customization
- Detection of os preferences for light or dark mode
- Override with cookie when clicking a button
  
### 2023-06-15
- Fixed word wrapping for pre code blocks on mobile
- Fixed the edit icon position on mobile

### 2023-06-14
- Initial release

## Screenshots

Basic colors
![kiwiki_screenshot](./screenshots/kiwiki_screenshot_2023_06_19_00.jpg)

Dark colors example
![kiwiki_screenshot01](./screenshots/kiwiki_screenshot_2023_06_19_01.jpg)

Theme colors editor
![kiwiki_screenshot02](./screenshots/kiwiki_screenshot_2023_06_19_02.jpg)
