<?php
    /**
     * Narro is an application that allows online software translation and maintenance.
     * Copyright (C) 2008-2010 Alexandru Szasz <alexxed@gmail.com>
     * http://code.google.com/p/narro/
     *
     * This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public
     * License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any
     * later version.
     *
     * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the
     * implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for
     * more details.
     *
     * You should have received a copy of the GNU General Public License along with this program; if not, write to the
     * Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
     */
    class NarroLink {
        public static function TextCommentList($strLinkText = '') {
            $strLink = sprintf('narro_text_comment_list.php?l=%s', QApplication::$TargetLanguage->LanguageCode);
            if ($strLinkText != '')
                return sprintf('<a href="%s">%s</a>', $strLink, $strLinkText);
            else
                return $strLink;
        }

        public static function ProjectManage($intProjectId, $strLinkText = '') {
            $strLink = sprintf('narro_project_manage.php?l=%s&p=%d', QApplication::$TargetLanguage->LanguageCode, $intProjectId);
            if ($strLinkText != '')
                return sprintf('<a href="%s">%s</a>', $strLink, $strLinkText);
            else
                return $strLink;
        }

        public static function ProjectEdit($intProjectId, $strLinkText = '') {
            $strLink = sprintf('project_edit.php?l=%s&p=%d', QApplication::$TargetLanguage->LanguageCode, $intProjectId);
            if ($strLinkText != '')
                return sprintf('<a href="%s">%s</a>', $strLink, $strLinkText);
            else
                return $strLink;
        }

        public static function ProjectImport($intProjectId, $strLinkText = '') {
            $strLink = sprintf('import.php?l=%s&p=%d', QApplication::$TargetLanguage->LanguageCode, $intProjectId);
            if ($strLinkText != '')
                return sprintf('<a href="%s">%s</a>', $strLink, $strLinkText);
            else
                return $strLink;
        }

        public static function ProjectExport($intProjectId, $strLinkText = '') {
            $strLink = sprintf('export.php?l=%s&p=%d', QApplication::$TargetLanguage->LanguageCode, $intProjectId);
            if ($strLinkText != '')
                return sprintf('<a href="%s">%s</a>', $strLink, $strLinkText);
            else
                return $strLink;
        }

        public static function ProjectLanguages($intProjectId, $strLinkText = '') {
            $strLink = sprintf('narro_project_language_list.php?l=%s&p=%d', QApplication::$TargetLanguage->LanguageCode, $intProjectId);
            if ($strLinkText != '')
                return sprintf('<a href="%s">%s</a>', $strLink, $strLinkText);
            else
                return $strLink;
        }

        public static function ProjectList($strLinkText = '', $intFilter = 0) {
            $strLink = sprintf('projects.php?l=%s&f=%d', QApplication::$TargetLanguage->LanguageCode, $intFilter);
            if ($strLinkText != '')
                return sprintf('<a href="%s">%s</a>', $strLink, $strLinkText);
            else
                return $strLink;
        }

        public static function ProjectTextList($intProjectId, $intTextFilter = 1, $intSearchType = 1, $strSearchText = '', $strLinkText = '') {
            $strLink = sprintf('narro_project_text_list.php?l=%s&p=%d&tf=%d&st=%d&s=%s', QApplication::$TargetLanguage->LanguageCode, $intProjectId, $intTextFilter, $intSearchType, urlencode($strSearchText));
            if ($strLinkText != '')
                return sprintf('<a href="%s">%s</a>', $strLink, $strLinkText);
            else
                return $strLink;
        }

        public static function ProjectTextCommentList($intProjectId, $strLinkText = '') {
            $strLink = sprintf('narro_project_text_comment_list.php?l=%s&p=%d', QApplication::$TargetLanguage->LanguageCode, $intProjectId);
            if ($strLinkText != '')
                return sprintf('<a href="%s">%s</a>', $strLink, $strLinkText);
            else
                return $strLink;
        }

        public static function FileTextList($intProjectId, $intFileId, $intTextFilter = 1, $intSearchType = 1, $strSearchText = '', $strLinkText = '') {
            $strLink = sprintf('file_texts.php?l=%s&p=%d&f=%d&tf=%d&st=%d&s=%s', QApplication::$TargetLanguage->LanguageCode, $intProjectId, $intFileId, $intTextFilter, $intSearchType, urlencode($strSearchText));
            if ($strLinkText != '')
                return sprintf('<a href="%s">%s</a>', $strLink, $strLinkText);
            else
                return $strLink;
        }

        public static function ProjectFileList($intProjectId, $strPath = '', $strSearchText = '', $strLinkText = '') {
            $strLink = sprintf('files.php?l=%s&p=%d&pf=%s&s=%s', QApplication::$TargetLanguage->LanguageCode, $intProjectId, $strPath, $strSearchText);
            if ($strLinkText != '')
                return sprintf('<a href="%s">%s</a>', $strLink, $strLinkText);
            else
                return $strLink;
        }

        public static function Project($intProjectId, $strLinkText = '') {
            $strLink = sprintf('project.php?l=%s&p=%d', QApplication::$TargetLanguage->LanguageCode, $intProjectId);
            if ($strLinkText != '')
                return sprintf('<a href="%s">%s</a>', $strLink, $strLinkText);
            else
                return $strLink;
        }

        /**
         * Creates a link to the translation page
         *
         * @param integer $intProjectId
         * @param string $strFilePath
         * @param integer $intFilter
         * @param string $strSearch
         * @param string $strSortBy
         * @param integer $intSortDir
         * @param integer $intMaxRowCount
         * @param integer $intStart
         * @param integer $intContextInfoId
         * @param string $strLinkText
         *
         * @return string if you provide the last parameter, a full <a> string is return, if not, just the href value
         */
        public static function Translate($intProjectId = null, $strFilePath = null, $intFilter = NarroTranslatePanel::SHOW_NOT_TRANSLATED, $strSearch = '', $strSortBy = null, $intSortDir = 1, $intMaxRowCount = 10, $intStart = 0, $intContextInfoId = '', $strLinkText = '') {
            $strLink = sprintf(
                'translate.php?l=%s&p=%s&f=%s&t=%s&s=%s&o=%s&h=%s&m=%d&i=%d#i%s',
                QApplication::$TargetLanguage->LanguageCode,
                $intProjectId,
                $strFilePath,
                $intFilter,
                $strSearch,
                $strSortBy,
                $intSortDir,
                $intMaxRowCount,
                $intStart,
                $intContextInfoId
            );
            if ($strLinkText != '')
                return sprintf('<a href="%s">%s</a>', $strLink, $strLinkText);
            else
                return $strLink;
        }

        public static function UserProfile($intUserId, $strLinkText = '') {
            $strLink = sprintf('narro_user_profile.php?l=%s&u=%d', QApplication::$TargetLanguage->LanguageCode, $intUserId);
            if ($strLinkText != '')
                return sprintf('<a href="%s">%s</a>', $strLink, $strLinkText);
            else
                return $strLink;
        }

        public static function UserRole($intUserId, $strLinkText = '') {
            $strLink = sprintf('narro_user_role.php?l=%s&u=%d', QApplication::$TargetLanguage->LanguageCode, $intUserId);
            if ($strLinkText != '')
                return sprintf('<a href="%s">%s</a>', $strLink, $strLinkText);
            else
                return $strLink;
        }

        public static function RoleList($intRoleId = 0, $strView = '', $strLinkText = '') {
            switch($strView) {
                case 'permission':
                        $strExtraLink = '&view=permission';
                        break;
                case 'user':
                        $strExtraLink = '&view=user';
                        break;
                default:
                        $strExtraLink = '';
            }

            if ($intRoleId)
                $strLink = sprintf('narro_role_list.php?l=%s&r=%d', QApplication::$TargetLanguage->LanguageCode, $intRoleId);
            else
                $strLink = sprintf('narro_role_list.php?l=%s', QApplication::$TargetLanguage->LanguageCode);

            $strLink .= $strExtraLink;

            if ($strLinkText != '')
                return sprintf('<a href="%s">%s</a>', $strLink, $strLinkText);
            else
                return $strLink;
        }

        public static function RoleEdit($intRoleId = null, $strLinkText = '') {
            $strLink = sprintf('narro_role_edit.php?l=%s&rid=%d', QApplication::$TargetLanguage->LanguageCode, $intRoleId);
            if ($strLinkText != '')
                return sprintf('<a href="%s">%s</a>', $strLink, $strLinkText);
            else
                return $strLink;
        }

        public static function UserPreferences($intUserId, $strLinkText = '') {
            $strLink = sprintf('narro_user_preferences.php?l=%s&u=%d', QApplication::$TargetLanguage->LanguageCode, $intUserId);
            if ($strLinkText != '')
                return sprintf('<a href="%s">%s</a>', $strLink, $strLinkText);
            else
                return $strLink;
        }

        public static function UserEdit($intUserId, $strLinkText = '') {
            $strLink = sprintf('narro_user_edit.php?l=%s&u=%d', QApplication::$TargetLanguage->LanguageCode, $intUserId);
            if ($strLinkText != '')
                return sprintf('<a href="%s">%s</a>', $strLink, $strLinkText);
            else
                return $strLink;
        }

        public static function ContextSuggest($intProjectId, $intFileId, $intContextId, $intTextFilter = 1, $intSearchType = 1, $strSearchText = '', $intCurrentContext = null, $intContextCount = null, $intSortColumnIndex = -1, $intSortDirection = 0, $blnShowComments = 0, $strLinkText = '', $strCssClass = '') {
            $strLink = sprintf(
                'narro_context_suggest.php?l=%s&p=%d&f=%d&c=%d&tf=%d&st=%d&s=%s&ci=%d&cc=%d&o=%d&a=%d&sc=%d',
                QApplication::$TargetLanguage->LanguageCode,
                $intProjectId,
                $intFileId,
                $intContextId,
                $intTextFilter,
                $intSearchType,
                urlencode($strSearchText),
                $intCurrentContext,
                $intContextCount,
                $intSortColumnIndex,
                $intSortDirection,
                $blnShowComments
            );
            if ($strLinkText != '')
                return sprintf('<a href="%s"%s>%s</a>', $strLink, (($strCssClass != '')?sprintf(' class="%s"', $strCssClass):''), $strLinkText);
            else
                return $strLink;
        }

        public static function LanguageList($strLinkText = '') {
            $strLink = sprintf('narro_language_list.php?l=%s', QApplication::$TargetLanguage->LanguageCode);
            if ($strLinkText != '')
                return sprintf('<a href="%s">%s</a>', $strLink, $strLinkText);
            else
                return $strLink;
        }

        public static function UserRegister($strLinkText = '') {
            $strLink = sprintf('narro_register.php?l=%s', QApplication::$TargetLanguage->LanguageCode);
            if ($strLinkText != '')
                return sprintf('<a href="%s">%s</a>', $strLink, $strLinkText);
            else
                return $strLink;
        }

        public static function UserLogin($strLinkText = '') {
            $strLink = sprintf('narro_login.php?l=%s', QApplication::$TargetLanguage->LanguageCode);
            if ($strLinkText != '')
                return sprintf('<a href="%s">%s</a>', $strLink, $strLinkText);
            else
                return $strLink;
        }

        public static function UserRecoverPassword($strLinkText = '') {
            $strLink = sprintf('narro_recover_password.php?l=%s', QApplication::$TargetLanguage->LanguageCode);
            if ($strLinkText != '')
                return sprintf('<a href="%s">%s</a>', $strLink, $strLinkText);
            else
                return $strLink;
        }

        public static function LanguageEdit($intLanguageId = null, $strLinkText = '') {
            $strLink = sprintf('narro_language_edit.php?l=%s&lid=%d', QApplication::$TargetLanguage->LanguageCode, $intLanguageId);
            if ($strLinkText != '')
                return sprintf('<a href="%s">%s</a>', $strLink, $strLinkText);
            else
                return $strLink;
        }

        public static function UserList($strSearch = '', $strLinkText = '') {
            $strLink = sprintf('narro_user_list.php?l=%s&s=%s', QApplication::$TargetLanguage->LanguageCode, $strSearch);
            if ($strLinkText != '')
                return sprintf('<a href="%s">%s</a>', $strLink, $strLinkText);
            else
                return $strLink;
        }

    }
?>