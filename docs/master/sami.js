
(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href=".html">Alorel</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Alorel_Dropbox" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Alorel/Dropbox.html">Dropbox</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Alorel_Dropbox_Exception" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Alorel/Dropbox/Exception.html">Exception</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Alorel_Dropbox_Exception_DropboxException" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Alorel/Dropbox/Exception/DropboxException.html">DropboxException</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Exception_NoTokenException" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Alorel/Dropbox/Exception/NoTokenException.html">NoTokenException</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Alorel_Dropbox_Operation" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Alorel/Dropbox/Operation.html">Operation</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Alorel_Dropbox_Operation_Files" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Alorel/Dropbox/Operation/Files.html">Files</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Alorel_Dropbox_Operation_Files_CopyReference" >                    <div style="padding-left:72px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Alorel/Dropbox/Operation/Files/CopyReference.html">CopyReference</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Alorel_Dropbox_Operation_Files_CopyReference_Get" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Files/CopyReference/Get.html">Get</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Operation_Files_CopyReference_Save" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Files/CopyReference/Save.html">Save</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Alorel_Dropbox_Operation_Files_ListFolder" >                    <div style="padding-left:72px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Alorel/Dropbox/Operation/Files/ListFolder.html">ListFolder</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Alorel_Dropbox_Operation_Files_ListFolder_GetLatestCursor" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Files/ListFolder/GetLatestCursor.html">GetLatestCursor</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Operation_Files_ListFolder_ListFolder" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Files/ListFolder/ListFolder.html">ListFolder</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Operation_Files_ListFolder_ListFolderContinue" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Files/ListFolder/ListFolderContinue.html">ListFolderContinue</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Operation_Files_ListFolder_Longpoll" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Files/ListFolder/Longpoll.html">Longpoll</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Alorel_Dropbox_Operation_Files_SaveUrl" >                    <div style="padding-left:72px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Alorel/Dropbox/Operation/Files/SaveUrl.html">SaveUrl</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Alorel_Dropbox_Operation_Files_SaveUrl_CheckJobStatus" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Files/SaveUrl/CheckJobStatus.html">CheckJobStatus</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Operation_Files_SaveUrl_SaveURL" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Files/SaveUrl/SaveURL.html">SaveURL</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Alorel_Dropbox_Operation_Files_UploadSession" >                    <div style="padding-left:72px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Alorel/Dropbox/Operation/Files/UploadSession.html">UploadSession</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Alorel_Dropbox_Operation_Files_UploadSession_Append" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Files/UploadSession/Append.html">Append</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Operation_Files_UploadSession_Finish" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Files/UploadSession/Finish.html">Finish</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Operation_Files_UploadSession_Start" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Files/UploadSession/Start.html">Start</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:Alorel_Dropbox_Operation_Files_Copy" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Files/Copy.html">Copy</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Operation_Files_CreateFolder" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Files/CreateFolder.html">CreateFolder</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Operation_Files_Delete" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Files/Delete.html">Delete</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Operation_Files_Download" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Files/Download.html">Download</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Operation_Files_GetMetadata" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Files/GetMetadata.html">GetMetadata</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Operation_Files_GetPreview" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Files/GetPreview.html">GetPreview</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Operation_Files_GetTemporaryLink" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Files/GetTemporaryLink.html">GetTemporaryLink</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Operation_Files_GetThumbnail" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Files/GetThumbnail.html">GetThumbnail</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Operation_Files_ListRevisions" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Files/ListRevisions.html">ListRevisions</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Operation_Files_Move" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Files/Move.html">Move</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Operation_Files_PermanentlyDelete" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Files/PermanentlyDelete.html">PermanentlyDelete</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Operation_Files_Restore" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Files/Restore.html">Restore</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Operation_Files_Search" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Files/Search.html">Search</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Operation_Files_Upload" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Files/Upload.html">Upload</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Alorel_Dropbox_Operation_Users" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Alorel/Dropbox/Operation/Users.html">Users</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Alorel_Dropbox_Operation_Users_GetAccount" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Users/GetAccount.html">GetAccount</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Operation_Users_GetAccountBatch" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Users/GetAccountBatch.html">GetAccountBatch</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Operation_Users_GetCurrentAccount" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Users/GetCurrentAccount.html">GetCurrentAccount</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Operation_Users_GetSpaceUsage" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/Users/GetSpaceUsage.html">GetSpaceUsage</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:Alorel_Dropbox_Operation_AbstractOperation" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Alorel/Dropbox/Operation/AbstractOperation.html">AbstractOperation</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Alorel_Dropbox_OperationKind" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Alorel/Dropbox/OperationKind.html">OperationKind</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Alorel_Dropbox_OperationKind_ContentDownloadOperation" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Alorel/Dropbox/OperationKind/ContentDownloadOperation.html">ContentDownloadOperation</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_OperationKind_ContentUploadAbstractOperation" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Alorel/Dropbox/OperationKind/ContentUploadAbstractOperation.html">ContentUploadAbstractOperation</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_OperationKind_RPCOperation" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Alorel/Dropbox/OperationKind/RPCOperation.html">RPCOperation</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_OperationKind_SingleArgumentRPCOperation" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Alorel/Dropbox/OperationKind/SingleArgumentRPCOperation.html">SingleArgumentRPCOperation</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_OperationKind_SourceDestRPCOperation" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Alorel/Dropbox/OperationKind/SourceDestRPCOperation.html">SourceDestRPCOperation</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Alorel_Dropbox_Options" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Alorel/Dropbox/Options.html">Options</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Alorel_Dropbox_Options_Builder" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Alorel/Dropbox/Options/Builder.html">Builder</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Alorel_Dropbox_Options_Builder_UploadSession" >                    <div style="padding-left:72px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Alorel/Dropbox/Options/Builder/UploadSession.html">UploadSession</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Alorel_Dropbox_Options_Builder_UploadSession_UploadSessionActiveOptions" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="Alorel/Dropbox/Options/Builder/UploadSession/UploadSessionActiveOptions.html">UploadSessionActiveOptions</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:Alorel_Dropbox_Options_Builder_GetMetadataOptions" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Options/Builder/GetMetadataOptions.html">GetMetadataOptions</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Options_Builder_GetThumbnailOptions" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Options/Builder/GetThumbnailOptions.html">GetThumbnailOptions</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Options_Builder_ListFolderOptions" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Options/Builder/ListFolderOptions.html">ListFolderOptions</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Options_Builder_ListRevisionsOptions" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Options/Builder/ListRevisionsOptions.html">ListRevisionsOptions</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Options_Builder_LongpollOptions" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Options/Builder/LongpollOptions.html">LongpollOptions</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Options_Builder_SearchOptions" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Options/Builder/SearchOptions.html">SearchOptions</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Options_Builder_UploadOptions" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Options/Builder/UploadOptions.html">UploadOptions</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Alorel_Dropbox_Options_Mixins" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Alorel/Dropbox/Options/Mixins.html">Mixins</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Alorel_Dropbox_Options_Mixins_AutoRenameTrait" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Options/Mixins/AutoRenameTrait.html">AutoRenameTrait</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Options_Mixins_ClientModifiedTrait" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Options/Mixins/ClientModifiedTrait.html">ClientModifiedTrait</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Options_Mixins_CloseTrait" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Options/Mixins/CloseTrait.html">CloseTrait</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Options_Mixins_IncludeDeletedTrait" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Options/Mixins/IncludeDeletedTrait.html">IncludeDeletedTrait</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Options_Mixins_IncludeHasExplicitSharedMembersTrait" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Options/Mixins/IncludeHasExplicitSharedMembersTrait.html">IncludeHasExplicitSharedMembersTrait</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Options_Mixins_IncludeMediaInfoTrait" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Options/Mixins/IncludeMediaInfoTrait.html">IncludeMediaInfoTrait</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Options_Mixins_LimitTrait" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Options/Mixins/LimitTrait.html">LimitTrait</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Options_Mixins_MaxResultsTrait" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Options/Mixins/MaxResultsTrait.html">MaxResultsTrait</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Options_Mixins_MuteTrait" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Options/Mixins/MuteTrait.html">MuteTrait</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Options_Mixins_RecursiveTrait" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Options/Mixins/RecursiveTrait.html">RecursiveTrait</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Options_Mixins_SearchModeTrait" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Options/Mixins/SearchModeTrait.html">SearchModeTrait</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Options_Mixins_StartTrait" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Options/Mixins/StartTrait.html">StartTrait</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Options_Mixins_ThumbnailFormatTrait" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Options/Mixins/ThumbnailFormatTrait.html">ThumbnailFormatTrait</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Options_Mixins_ThumbnailSizeTrait" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Options/Mixins/ThumbnailSizeTrait.html">ThumbnailSizeTrait</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Options_Mixins_TimeoutTrait" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Options/Mixins/TimeoutTrait.html">TimeoutTrait</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Options_Mixins_WriteModeTrait" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Alorel/Dropbox/Options/Mixins/WriteModeTrait.html">WriteModeTrait</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:Alorel_Dropbox_Options_Option" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Alorel/Dropbox/Options/Option.html">Option</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Options_Options" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Alorel/Dropbox/Options/Options.html">Options</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Alorel_Dropbox_Parameters" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Alorel/Dropbox/Parameters.html">Parameters</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Alorel_Dropbox_Parameters_AbstractParameter" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Alorel/Dropbox/Parameters/AbstractParameter.html">AbstractParameter</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Parameters_CommitInfo" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Alorel/Dropbox/Parameters/CommitInfo.html">CommitInfo</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Parameters_SearchMode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Alorel/Dropbox/Parameters/SearchMode.html">SearchMode</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Parameters_ThumbnailFormat" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Alorel/Dropbox/Parameters/ThumbnailFormat.html">ThumbnailFormat</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Parameters_ThumbnailSize" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Alorel/Dropbox/Parameters/ThumbnailSize.html">ThumbnailSize</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Parameters_UploadSessionCursor" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Alorel/Dropbox/Parameters/UploadSessionCursor.html">UploadSessionCursor</a>                    </div>                </li>                            <li data-name="class:Alorel_Dropbox_Parameters_WriteMode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Alorel/Dropbox/Parameters/WriteMode.html">WriteMode</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Alorel_Dropbox_Response" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Alorel/Dropbox/Response.html">Response</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Alorel_Dropbox_Response_ResponseAttribute" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Alorel/Dropbox/Response/ResponseAttribute.html">ResponseAttribute</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:Alorel_Dropbox_Util" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Alorel/Dropbox/Util.html">Util</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [

        {"type": "Namespace", "link": "Alorel.html", "name": "Alorel", "doc": "Namespace Alorel"}, {
            "type": "Namespace",
            "link": "Alorel/Dropbox.html",
            "name": "Alorel\\Dropbox",
            "doc": "Namespace Alorel\\Dropbox"
        }, {
            "type": "Namespace",
            "link": "Alorel/Dropbox/Exception.html",
            "name": "Alorel\\Dropbox\\Exception",
            "doc": "Namespace Alorel\\Dropbox\\Exception"
        }, {
            "type": "Namespace",
            "link": "Alorel/Dropbox/Operation.html",
            "name": "Alorel\\Dropbox\\Operation",
            "doc": "Namespace Alorel\\Dropbox\\Operation"
        }, {
            "type": "Namespace",
            "link": "Alorel/Dropbox/OperationKind.html",
            "name": "Alorel\\Dropbox\\OperationKind",
            "doc": "Namespace Alorel\\Dropbox\\OperationKind"
        }, {
            "type": "Namespace",
            "link": "Alorel/Dropbox/Operation/Files.html",
            "name": "Alorel\\Dropbox\\Operation\\Files",
            "doc": "Namespace Alorel\\Dropbox\\Operation\\Files"
        }, {
            "type": "Namespace",
            "link": "Alorel/Dropbox/Operation/Files/CopyReference.html",
            "name": "Alorel\\Dropbox\\Operation\\Files\\CopyReference",
            "doc": "Namespace Alorel\\Dropbox\\Operation\\Files\\CopyReference"
        }, {
            "type": "Namespace",
            "link": "Alorel/Dropbox/Operation/Files/ListFolder.html",
            "name": "Alorel\\Dropbox\\Operation\\Files\\ListFolder",
            "doc": "Namespace Alorel\\Dropbox\\Operation\\Files\\ListFolder"
        }, {
            "type": "Namespace",
            "link": "Alorel/Dropbox/Operation/Files/SaveUrl.html",
            "name": "Alorel\\Dropbox\\Operation\\Files\\SaveUrl",
            "doc": "Namespace Alorel\\Dropbox\\Operation\\Files\\SaveUrl"
        }, {
            "type": "Namespace",
            "link": "Alorel/Dropbox/Operation/Files/UploadSession.html",
            "name": "Alorel\\Dropbox\\Operation\\Files\\UploadSession",
            "doc": "Namespace Alorel\\Dropbox\\Operation\\Files\\UploadSession"
        }, {
            "type": "Namespace",
            "link": "Alorel/Dropbox/Operation/Users.html",
            "name": "Alorel\\Dropbox\\Operation\\Users",
            "doc": "Namespace Alorel\\Dropbox\\Operation\\Users"
        }, {
            "type": "Namespace",
            "link": "Alorel/Dropbox/Options.html",
            "name": "Alorel\\Dropbox\\Options",
            "doc": "Namespace Alorel\\Dropbox\\Options"
        }, {
            "type": "Namespace",
            "link": "Alorel/Dropbox/Options/Builder.html",
            "name": "Alorel\\Dropbox\\Options\\Builder",
            "doc": "Namespace Alorel\\Dropbox\\Options\\Builder"
        }, {
            "type": "Namespace",
            "link": "Alorel/Dropbox/Options/Builder/UploadSession.html",
            "name": "Alorel\\Dropbox\\Options\\Builder\\UploadSession",
            "doc": "Namespace Alorel\\Dropbox\\Options\\Builder\\UploadSession"
        }, {
            "type": "Namespace",
            "link": "Alorel/Dropbox/Options/Mixins.html",
            "name": "Alorel\\Dropbox\\Options\\Mixins",
            "doc": "Namespace Alorel\\Dropbox\\Options\\Mixins"
        }, {
            "type": "Namespace",
            "link": "Alorel/Dropbox/Parameters.html",
            "name": "Alorel\\Dropbox\\Parameters",
            "doc": "Namespace Alorel\\Dropbox\\Parameters"
        }, {
            "type": "Namespace",
            "link": "Alorel/Dropbox/Response.html",
            "name": "Alorel\\Dropbox\\Response",
            "doc": "Namespace Alorel\\Dropbox\\Response"
        },
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Exception", "fromLink": "Alorel/Dropbox/Exception.html", "link": "Alorel/Dropbox/Exception/DropboxException.html", "name": "Alorel\\Dropbox\\Exception\\DropboxException", "doc": "&quot;Exception wrapper&quot;"},
                    
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Exception", "fromLink": "Alorel/Dropbox/Exception.html", "link": "Alorel/Dropbox/Exception/NoTokenException.html", "name": "Alorel\\Dropbox\\Exception\\NoTokenException", "doc": "&quot;Exception for when the API key is not provided&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Exception\\NoTokenException", "fromLink": "Alorel/Dropbox/Exception/NoTokenException.html", "link": "Alorel/Dropbox/Exception/NoTokenException.html#method___construct", "name": "Alorel\\Dropbox\\Exception\\NoTokenException::__construct", "doc": "&quot;NoTokenException constructor.&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\OperationKind", "fromLink": "Alorel/Dropbox/OperationKind.html", "link": "Alorel/Dropbox/OperationKind/ContentDownloadOperation.html", "name": "Alorel\\Dropbox\\OperationKind\\ContentDownloadOperation", "doc": "&quot;Abstraction for content downloads&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\OperationKind\\ContentDownloadOperation", "fromLink": "Alorel/Dropbox/OperationKind/ContentDownloadOperation.html", "link": "Alorel/Dropbox/OperationKind/ContentDownloadOperation.html#method_send", "name": "Alorel\\Dropbox\\OperationKind\\ContentDownloadOperation::send", "doc": "&quot;Send our request&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\OperationKind", "fromLink": "Alorel/Dropbox/OperationKind.html", "link": "Alorel/Dropbox/OperationKind/ContentUploadAbstractOperation.html", "name": "Alorel\\Dropbox\\OperationKind\\ContentUploadAbstractOperation", "doc": "&quot;A wrapper for the ContentUpload group of operations&quot;"},
                    
            {"type": "Class", "fromName": "Alorel\\Dropbox\\OperationKind", "fromLink": "Alorel/Dropbox/OperationKind.html", "link": "Alorel/Dropbox/OperationKind/RPCOperation.html", "name": "Alorel\\Dropbox\\OperationKind\\RPCOperation", "doc": "&quot;Wrapper for RPC endpoints&quot;"},
                    
            {"type": "Class", "fromName": "Alorel\\Dropbox\\OperationKind", "fromLink": "Alorel/Dropbox/OperationKind.html", "link": "Alorel/Dropbox/OperationKind/SingleArgumentRPCOperation.html", "name": "Alorel\\Dropbox\\OperationKind\\SingleArgumentRPCOperation", "doc": "&quot;A subtype of RPC that only accepts a single argument&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\OperationKind\\SingleArgumentRPCOperation", "fromLink": "Alorel/Dropbox/OperationKind/SingleArgumentRPCOperation.html", "link": "Alorel/Dropbox/OperationKind/SingleArgumentRPCOperation.html#method_raw", "name": "Alorel\\Dropbox\\OperationKind\\SingleArgumentRPCOperation::raw", "doc": "&quot;Perform the operation, returning a promise or raw response object&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\OperationKind", "fromLink": "Alorel/Dropbox/OperationKind.html", "link": "Alorel/Dropbox/OperationKind/SourceDestRPCOperation.html", "name": "Alorel\\Dropbox\\OperationKind\\SourceDestRPCOperation", "doc": "&quot;A subtype of RPC that only needs a source path and a destination path&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\OperationKind\\SourceDestRPCOperation", "fromLink": "Alorel/Dropbox/OperationKind/SourceDestRPCOperation.html", "link": "Alorel/Dropbox/OperationKind/SourceDestRPCOperation.html#method_raw", "name": "Alorel\\Dropbox\\OperationKind\\SourceDestRPCOperation::raw", "doc": "&quot;Perform the operation, returning a promise or raw response object&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Operation", "fromLink": "Alorel/Dropbox/Operation.html", "link": "Alorel/Dropbox/Operation/AbstractOperation.html", "name": "Alorel\\Dropbox\\Operation\\AbstractOperation", "doc": "&quot;The most abstract operation wrapper&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Operation\\AbstractOperation", "fromLink": "Alorel/Dropbox/Operation/AbstractOperation.html", "link": "Alorel/Dropbox/Operation/AbstractOperation.html#method___construct", "name": "Alorel\\Dropbox\\Operation\\AbstractOperation::__construct", "doc": "&quot;Operation constructor.&quot;"},
                    {"type": "Method", "fromName": "Alorel\\Dropbox\\Operation\\AbstractOperation", "fromLink": "Alorel/Dropbox/Operation/AbstractOperation.html", "link": "Alorel/Dropbox/Operation/AbstractOperation.html#method_setDefaultToken", "name": "Alorel\\Dropbox\\Operation\\AbstractOperation::setDefaultToken", "doc": "&quot;Sets the default token to use with the constructor&quot;"},
                    {"type": "Method", "fromName": "Alorel\\Dropbox\\Operation\\AbstractOperation", "fromLink": "Alorel/Dropbox/Operation/AbstractOperation.html", "link": "Alorel/Dropbox/Operation/AbstractOperation.html#method_isAsync", "name": "Alorel\\Dropbox\\Operation\\AbstractOperation::isAsync", "doc": "&quot;Return whether we&#039;re operating in async mode&quot;"},
                    {"type": "Method", "fromName": "Alorel\\Dropbox\\Operation\\AbstractOperation", "fromLink": "Alorel/Dropbox/Operation/AbstractOperation.html", "link": "Alorel/Dropbox/Operation/AbstractOperation.html#method_setAsync", "name": "Alorel\\Dropbox\\Operation\\AbstractOperation::setAsync", "doc": "&quot;Sets the sync\/async operation mode&quot;"},
                    {"type": "Method", "fromName": "Alorel\\Dropbox\\Operation\\AbstractOperation", "fromLink": "Alorel/Dropbox/Operation/AbstractOperation.html", "link": "Alorel/Dropbox/Operation/AbstractOperation.html#method_setDefaultAsync", "name": "Alorel\\Dropbox\\Operation\\AbstractOperation::setDefaultAsync", "doc": "&quot;Sets the default $async value for the constructor&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Operation\\Files", "fromLink": "Alorel/Dropbox/Operation/Files.html", "link": "Alorel/Dropbox/Operation/Files/Copy.html", "name": "Alorel\\Dropbox\\Operation\\Files\\Copy", "doc": "&quot;The Copy operation&quot;"},
                    
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Operation\\Files\\CopyReference", "fromLink": "Alorel/Dropbox/Operation/Files/CopyReference.html", "link": "Alorel/Dropbox/Operation/Files/CopyReference/Get.html", "name": "Alorel\\Dropbox\\Operation\\Files\\CopyReference\\Get", "doc": "&quot;Get a copy reference to a file or folder. This reference string can be used to save that file or folder to\nanother user&#039;s Dropbox by passing it to copy_reference\/save.&quot;"},
                    
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Operation\\Files\\CopyReference", "fromLink": "Alorel/Dropbox/Operation/Files/CopyReference.html", "link": "Alorel/Dropbox/Operation/Files/CopyReference/Save.html", "name": "Alorel\\Dropbox\\Operation\\Files\\CopyReference\\Save", "doc": "&quot;Save a copy reference returned by copy_reference\/get to the user&#039;s Dropbox.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Operation\\Files\\CopyReference\\Save", "fromLink": "Alorel/Dropbox/Operation/Files/CopyReference/Save.html", "link": "Alorel/Dropbox/Operation/Files/CopyReference/Save.html#method_raw", "name": "Alorel\\Dropbox\\Operation\\Files\\CopyReference\\Save::raw", "doc": "&quot;Perform the operation, returning a promise or raw response object&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Operation\\Files", "fromLink": "Alorel/Dropbox/Operation/Files.html", "link": "Alorel/Dropbox/Operation/Files/CreateFolder.html", "name": "Alorel\\Dropbox\\Operation\\Files\\CreateFolder", "doc": "&quot;Create a folder at a given path.&quot;"},
                    
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Operation\\Files", "fromLink": "Alorel/Dropbox/Operation/Files.html", "link": "Alorel/Dropbox/Operation/Files/Delete.html", "name": "Alorel\\Dropbox\\Operation\\Files\\Delete", "doc": "&quot;The delete operation&quot;"},
                    
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Operation\\Files", "fromLink": "Alorel/Dropbox/Operation/Files.html", "link": "Alorel/Dropbox/Operation/Files/Download.html", "name": "Alorel\\Dropbox\\Operation\\Files\\Download", "doc": "&quot;Download a file&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Operation\\Files\\Download", "fromLink": "Alorel/Dropbox/Operation/Files/Download.html", "link": "Alorel/Dropbox/Operation/Files/Download.html#method_raw", "name": "Alorel\\Dropbox\\Operation\\Files\\Download::raw", "doc": "&quot;Perform the operation, returning a promise or raw response object&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Operation\\Files", "fromLink": "Alorel/Dropbox/Operation/Files.html", "link": "Alorel/Dropbox/Operation/Files/GetMetadata.html", "name": "Alorel\\Dropbox\\Operation\\Files\\GetMetadata", "doc": "&quot;The get_metadata operation&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Operation\\Files\\GetMetadata", "fromLink": "Alorel/Dropbox/Operation/Files/GetMetadata.html", "link": "Alorel/Dropbox/Operation/Files/GetMetadata.html#method_raw", "name": "Alorel\\Dropbox\\Operation\\Files\\GetMetadata::raw", "doc": "&quot;Perform the operation, returning a promise or raw response object&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Operation\\Files", "fromLink": "Alorel/Dropbox/Operation/Files.html", "link": "Alorel/Dropbox/Operation/Files/GetPreview.html", "name": "Alorel\\Dropbox\\Operation\\Files\\GetPreview", "doc": "&quot;Get a preview for a file. Currently previews are only generated for the files with the following extensions:&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Operation\\Files\\GetPreview", "fromLink": "Alorel/Dropbox/Operation/Files/GetPreview.html", "link": "Alorel/Dropbox/Operation/Files/GetPreview.html#method_raw", "name": "Alorel\\Dropbox\\Operation\\Files\\GetPreview::raw", "doc": "&quot;Perform the operation, returning a promise or raw response object&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Operation\\Files", "fromLink": "Alorel/Dropbox/Operation/Files.html", "link": "Alorel/Dropbox/Operation/Files/GetTemporaryLink.html", "name": "Alorel\\Dropbox\\Operation\\Files\\GetTemporaryLink", "doc": "&quot;Get a temporary link to stream content of a file. This link will expire in four hours and afterwards you will\nget 410 Gone. Content-Type of the link is determined automatically by the file&#039;s mime type.&quot;"},
                    
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Operation\\Files", "fromLink": "Alorel/Dropbox/Operation/Files.html", "link": "Alorel/Dropbox/Operation/Files/GetThumbnail.html", "name": "Alorel\\Dropbox\\Operation\\Files\\GetThumbnail", "doc": "&quot;Get the file&#039;s thumbnail&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Operation\\Files\\GetThumbnail", "fromLink": "Alorel/Dropbox/Operation/Files/GetThumbnail.html", "link": "Alorel/Dropbox/Operation/Files/GetThumbnail.html#method_raw", "name": "Alorel\\Dropbox\\Operation\\Files\\GetThumbnail::raw", "doc": "&quot;Perform the operation, returning a promise or raw response object&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Operation\\Files\\ListFolder", "fromLink": "Alorel/Dropbox/Operation/Files/ListFolder.html", "link": "Alorel/Dropbox/Operation/Files/ListFolder/GetLatestCursor.html", "name": "Alorel\\Dropbox\\Operation\\Files\\ListFolder\\GetLatestCursor", "doc": "&quot;A way to quickly get a cursor for the folder&#039;s state. Unlike list&lt;em&gt;folder, list&lt;\/em&gt;folder\/get&lt;em&gt;latest&lt;\/em&gt;cursor\ndoesn&#039;t return any entries. This endpoint is for app which only needs to know about new files and\nmodifications and doesn&#039;t need to know about files that already exist in Dropbox.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Operation\\Files\\ListFolder\\GetLatestCursor", "fromLink": "Alorel/Dropbox/Operation/Files/ListFolder/GetLatestCursor.html", "link": "Alorel/Dropbox/Operation/Files/ListFolder/GetLatestCursor.html#method_raw", "name": "Alorel\\Dropbox\\Operation\\Files\\ListFolder\\GetLatestCursor::raw", "doc": "&quot;Perform the operation, returning a promise or raw response object&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Operation\\Files\\ListFolder", "fromLink": "Alorel/Dropbox/Operation/Files/ListFolder.html", "link": "Alorel/Dropbox/Operation/Files/ListFolder/ListFolder.html", "name": "Alorel\\Dropbox\\Operation\\Files\\ListFolder\\ListFolder", "doc": "&quot;Returns the contents of a folder.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Operation\\Files\\ListFolder\\ListFolder", "fromLink": "Alorel/Dropbox/Operation/Files/ListFolder/ListFolder.html", "link": "Alorel/Dropbox/Operation/Files/ListFolder/ListFolder.html#method_raw", "name": "Alorel\\Dropbox\\Operation\\Files\\ListFolder\\ListFolder::raw", "doc": "&quot;Perform the operation, returning a promise or raw response object&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Operation\\Files\\ListFolder", "fromLink": "Alorel/Dropbox/Operation/Files/ListFolder.html", "link": "Alorel/Dropbox/Operation/Files/ListFolder/ListFolderContinue.html", "name": "Alorel\\Dropbox\\Operation\\Files\\ListFolder\\ListFolderContinue", "doc": "&quot;Once a cursor has been retrieved from list_folder, use this to paginate through all files and retrieve updates\nto the folder.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Operation\\Files\\ListFolder\\ListFolderContinue", "fromLink": "Alorel/Dropbox/Operation/Files/ListFolder/ListFolderContinue.html", "link": "Alorel/Dropbox/Operation/Files/ListFolder/ListFolderContinue.html#method_raw", "name": "Alorel\\Dropbox\\Operation\\Files\\ListFolder\\ListFolderContinue::raw", "doc": "&quot;Perform the operation, returning a promise or raw response object&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Operation\\Files\\ListFolder", "fromLink": "Alorel/Dropbox/Operation/Files/ListFolder.html", "link": "Alorel/Dropbox/Operation/Files/ListFolder/Longpoll.html", "name": "Alorel\\Dropbox\\Operation\\Files\\ListFolder\\Longpoll", "doc": "&quot;A longpoll endpoint to wait for changes on an account. In conjunction with list_folder\/continue, this call\ngives you a low-latency way to monitor an account for file changes. The connection will block until there are\nchanges available or a timeout occurs. This endpoint is useful mostly for client-side apps.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Operation\\Files\\ListFolder\\Longpoll", "fromLink": "Alorel/Dropbox/Operation/Files/ListFolder/Longpoll.html", "link": "Alorel/Dropbox/Operation/Files/ListFolder/Longpoll.html#method_raw", "name": "Alorel\\Dropbox\\Operation\\Files\\ListFolder\\Longpoll::raw", "doc": "&quot;Perform the operation, returning a promise or raw response object&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Operation\\Files", "fromLink": "Alorel/Dropbox/Operation/Files.html", "link": "Alorel/Dropbox/Operation/Files/ListRevisions.html", "name": "Alorel\\Dropbox\\Operation\\Files\\ListRevisions", "doc": "&quot;Return revisions of a file&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Operation\\Files\\ListRevisions", "fromLink": "Alorel/Dropbox/Operation/Files/ListRevisions.html", "link": "Alorel/Dropbox/Operation/Files/ListRevisions.html#method_raw", "name": "Alorel\\Dropbox\\Operation\\Files\\ListRevisions::raw", "doc": "&quot;Perform the operation, returning a promise or raw response object&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Operation\\Files", "fromLink": "Alorel/Dropbox/Operation/Files.html", "link": "Alorel/Dropbox/Operation/Files/Move.html", "name": "Alorel\\Dropbox\\Operation\\Files\\Move", "doc": "&quot;The Move operation&quot;"},
                    
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Operation\\Files", "fromLink": "Alorel/Dropbox/Operation/Files.html", "link": "Alorel/Dropbox/Operation/Files/PermanentlyDelete.html", "name": "Alorel\\Dropbox\\Operation\\Files\\PermanentlyDelete", "doc": "&quot;The permanently_delete operation&quot;"},
                    
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Operation\\Files", "fromLink": "Alorel/Dropbox/Operation/Files.html", "link": "Alorel/Dropbox/Operation/Files/Restore.html", "name": "Alorel\\Dropbox\\Operation\\Files\\Restore", "doc": "&quot;Restore a file to a specific revision&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Operation\\Files\\Restore", "fromLink": "Alorel/Dropbox/Operation/Files/Restore.html", "link": "Alorel/Dropbox/Operation/Files/Restore.html#method_raw", "name": "Alorel\\Dropbox\\Operation\\Files\\Restore::raw", "doc": "&quot;Perform the operation, returning a promise or raw response object&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Operation\\Files\\SaveUrl", "fromLink": "Alorel/Dropbox/Operation/Files/SaveUrl.html", "link": "Alorel/Dropbox/Operation/Files/SaveUrl/CheckJobStatus.html", "name": "Alorel\\Dropbox\\Operation\\Files\\SaveUrl\\CheckJobStatus", "doc": "&quot;Check the status of a save_url job.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Operation\\Files\\SaveUrl\\CheckJobStatus", "fromLink": "Alorel/Dropbox/Operation/Files/SaveUrl/CheckJobStatus.html", "link": "Alorel/Dropbox/Operation/Files/SaveUrl/CheckJobStatus.html#method_raw", "name": "Alorel\\Dropbox\\Operation\\Files\\SaveUrl\\CheckJobStatus::raw", "doc": "&quot;Perform the operation, returning a promise or raw response object&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Operation\\Files\\SaveUrl", "fromLink": "Alorel/Dropbox/Operation/Files/SaveUrl.html", "link": "Alorel/Dropbox/Operation/Files/SaveUrl/SaveURL.html", "name": "Alorel\\Dropbox\\Operation\\Files\\SaveUrl\\SaveURL", "doc": "&quot;Save a specified URL into a file in user&#039;s Dropbox. If the given path already exists, the file will be renamed\nto avoid the conflict (e.g. myfile (1).txt).&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Operation\\Files\\SaveUrl\\SaveURL", "fromLink": "Alorel/Dropbox/Operation/Files/SaveUrl/SaveURL.html", "link": "Alorel/Dropbox/Operation/Files/SaveUrl/SaveURL.html#method_raw", "name": "Alorel\\Dropbox\\Operation\\Files\\SaveUrl\\SaveURL::raw", "doc": "&quot;Perform the operation, returning a promise or raw response object&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Operation\\Files", "fromLink": "Alorel/Dropbox/Operation/Files.html", "link": "Alorel/Dropbox/Operation/Files/Search.html", "name": "Alorel\\Dropbox\\Operation\\Files\\Search", "doc": "&quot;Searches for files and folders. Note: Recent changes may not immediately be reflected in search results due to\na short delay in indexing.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Operation\\Files\\Search", "fromLink": "Alorel/Dropbox/Operation/Files/Search.html", "link": "Alorel/Dropbox/Operation/Files/Search.html#method_raw", "name": "Alorel\\Dropbox\\Operation\\Files\\Search::raw", "doc": "&quot;Perform the operation, returning a promise or raw response object&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Operation\\Files", "fromLink": "Alorel/Dropbox/Operation/Files.html", "link": "Alorel/Dropbox/Operation/Files/Upload.html", "name": "Alorel\\Dropbox\\Operation\\Files\\Upload", "doc": "&quot;Create a new file with the contents provided in the request. Do not use this to upload a file larger than\n150 MB. Instead, create an upload session with upload_session\/start.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Operation\\Files\\Upload", "fromLink": "Alorel/Dropbox/Operation/Files/Upload.html", "link": "Alorel/Dropbox/Operation/Files/Upload.html#method_raw", "name": "Alorel\\Dropbox\\Operation\\Files\\Upload::raw", "doc": "&quot;Perform the operation, returning a promise or raw response object&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Operation\\Files\\UploadSession", "fromLink": "Alorel/Dropbox/Operation/Files/UploadSession.html", "link": "Alorel/Dropbox/Operation/Files/UploadSession/Append.html", "name": "Alorel\\Dropbox\\Operation\\Files\\UploadSession\\Append", "doc": "&quot;Append more data to an upload session. When the parameter close is set, this call will close the session. A\nsingle request should not upload more than 150 MB of file contents.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Operation\\Files\\UploadSession\\Append", "fromLink": "Alorel/Dropbox/Operation/Files/UploadSession/Append.html", "link": "Alorel/Dropbox/Operation/Files/UploadSession/Append.html#method_raw", "name": "Alorel\\Dropbox\\Operation\\Files\\UploadSession\\Append::raw", "doc": "&quot;Perform the operation, returning a promise or raw response object&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Operation\\Files\\UploadSession", "fromLink": "Alorel/Dropbox/Operation/Files/UploadSession.html", "link": "Alorel/Dropbox/Operation/Files/UploadSession/Finish.html", "name": "Alorel\\Dropbox\\Operation\\Files\\UploadSession\\Finish", "doc": "&quot;Finish an upload session and save the uploaded data to the given file path. A single request should not upload\nmore than 150 MB of file contents.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Operation\\Files\\UploadSession\\Finish", "fromLink": "Alorel/Dropbox/Operation/Files/UploadSession/Finish.html", "link": "Alorel/Dropbox/Operation/Files/UploadSession/Finish.html#method_raw", "name": "Alorel\\Dropbox\\Operation\\Files\\UploadSession\\Finish::raw", "doc": "&quot;Perform the operation, returning a promise or raw response object&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Operation\\Files\\UploadSession", "fromLink": "Alorel/Dropbox/Operation/Files/UploadSession.html", "link": "Alorel/Dropbox/Operation/Files/UploadSession/Start.html", "name": "Alorel\\Dropbox\\Operation\\Files\\UploadSession\\Start", "doc": "&quot;Upload sessions allow you to upload a single file using multiple requests. This call starts a new upload\nsession with the given data. You can then use upload&lt;em&gt;session\/append to add more data and upload&lt;\/em&gt;session\/finish\nto save all the data to a file in Dropbox.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Operation\\Files\\UploadSession\\Start", "fromLink": "Alorel/Dropbox/Operation/Files/UploadSession/Start.html", "link": "Alorel/Dropbox/Operation/Files/UploadSession/Start.html#method_raw", "name": "Alorel\\Dropbox\\Operation\\Files\\UploadSession\\Start::raw", "doc": "&quot;Perform the operation, returning a promise or raw response object&quot;"},

        {
            "type": "Class",
            "fromName": "Alorel\\Dropbox\\Operation\\Users",
            "fromLink": "Alorel/Dropbox/Operation/Users.html",
            "link": "Alorel/Dropbox/Operation/Users/GetAccount.html",
            "name": "Alorel\\Dropbox\\Operation\\Users\\GetAccount",
            "doc": "&quot;Get information about a user&#039;s account.&quot;"
        },
        {
            "type": "Method",
            "fromName": "Alorel\\Dropbox\\Operation\\Users\\GetAccount",
            "fromLink": "Alorel/Dropbox/Operation/Users/GetAccount.html",
            "link": "Alorel/Dropbox/Operation/Users/GetAccount.html#method_raw",
            "name": "Alorel\\Dropbox\\Operation\\Users\\GetAccount::raw",
            "doc": "&quot;Perform the operation, returning a promise or raw response object&quot;"
        },

        {
            "type": "Class",
            "fromName": "Alorel\\Dropbox\\Operation\\Users",
            "fromLink": "Alorel/Dropbox/Operation/Users.html",
            "link": "Alorel/Dropbox/Operation/Users/GetAccountBatch.html",
            "name": "Alorel\\Dropbox\\Operation\\Users\\GetAccountBatch",
            "doc": "&quot;Get information about multiple user accounts. At most 300 accounts may be queried per request.&quot;"
        },
        {
            "type": "Method",
            "fromName": "Alorel\\Dropbox\\Operation\\Users\\GetAccountBatch",
            "fromLink": "Alorel/Dropbox/Operation/Users/GetAccountBatch.html",
            "link": "Alorel/Dropbox/Operation/Users/GetAccountBatch.html#method_raw",
            "name": "Alorel\\Dropbox\\Operation\\Users\\GetAccountBatch::raw",
            "doc": "&quot;Perform the operation, returning a promise or raw response object&quot;"
        },

        {
            "type": "Class",
            "fromName": "Alorel\\Dropbox\\Operation\\Users",
            "fromLink": "Alorel/Dropbox/Operation/Users.html",
            "link": "Alorel/Dropbox/Operation/Users/GetCurrentAccount.html",
            "name": "Alorel\\Dropbox\\Operation\\Users\\GetCurrentAccount",
            "doc": "&quot;Get information about the current user&#039;s account.&quot;"
        },
        {
            "type": "Method",
            "fromName": "Alorel\\Dropbox\\Operation\\Users\\GetCurrentAccount",
            "fromLink": "Alorel/Dropbox/Operation/Users/GetCurrentAccount.html",
            "link": "Alorel/Dropbox/Operation/Users/GetCurrentAccount.html#method_raw",
            "name": "Alorel\\Dropbox\\Operation\\Users\\GetCurrentAccount::raw",
            "doc": "&quot;Perform the operation, returning a promise or raw response object&quot;"
        },

        {
            "type": "Class",
            "fromName": "Alorel\\Dropbox\\Operation\\Users",
            "fromLink": "Alorel/Dropbox/Operation/Users.html",
            "link": "Alorel/Dropbox/Operation/Users/GetSpaceUsage.html",
            "name": "Alorel\\Dropbox\\Operation\\Users\\GetSpaceUsage",
            "doc": "&quot;Get the space usage information for the current user&#039;s account.&quot;"
        },
        {
            "type": "Method",
            "fromName": "Alorel\\Dropbox\\Operation\\Users\\GetSpaceUsage",
            "fromLink": "Alorel/Dropbox/Operation/Users/GetSpaceUsage.html",
            "link": "Alorel/Dropbox/Operation/Users/GetSpaceUsage.html#method_raw",
            "name": "Alorel\\Dropbox\\Operation\\Users\\GetSpaceUsage::raw",
            "doc": "&quot;Perform the operation, returning a promise or raw response object&quot;"
        },
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Options\\Builder", "fromLink": "Alorel/Dropbox/Options/Builder.html", "link": "Alorel/Dropbox/Options/Builder/GetMetadataOptions.html", "name": "Alorel\\Dropbox\\Options\\Builder\\GetMetadataOptions", "doc": "&quot;Additional options for the GetMetadata operation&quot;"},
                    
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Options\\Builder", "fromLink": "Alorel/Dropbox/Options/Builder.html", "link": "Alorel/Dropbox/Options/Builder/GetThumbnailOptions.html", "name": "Alorel\\Dropbox\\Options\\Builder\\GetThumbnailOptions", "doc": "&quot;Options for the get_thumbnail operation&quot;"},
                    
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Options\\Builder", "fromLink": "Alorel/Dropbox/Options/Builder.html", "link": "Alorel/Dropbox/Options/Builder/ListFolderOptions.html", "name": "Alorel\\Dropbox\\Options\\Builder\\ListFolderOptions", "doc": "&quot;Additional options for the ListFolder operation&quot;"},
                    
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Options\\Builder", "fromLink": "Alorel/Dropbox/Options/Builder.html", "link": "Alorel/Dropbox/Options/Builder/ListRevisionsOptions.html", "name": "Alorel\\Dropbox\\Options\\Builder\\ListRevisionsOptions", "doc": "&quot;Additional options for the list_revisions operation&quot;"},
                    
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Options\\Builder", "fromLink": "Alorel/Dropbox/Options/Builder.html", "link": "Alorel/Dropbox/Options/Builder/LongpollOptions.html", "name": "Alorel\\Dropbox\\Options\\Builder\\LongpollOptions", "doc": "&quot;Options for the Longpoll operation&quot;"},
                    
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Options\\Builder", "fromLink": "Alorel/Dropbox/Options/Builder.html", "link": "Alorel/Dropbox/Options/Builder/SearchOptions.html", "name": "Alorel\\Dropbox\\Options\\Builder\\SearchOptions", "doc": "&quot;Options for the search operation&quot;"},
                    
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Options\\Builder", "fromLink": "Alorel/Dropbox/Options/Builder.html", "link": "Alorel/Dropbox/Options/Builder/UploadOptions.html", "name": "Alorel\\Dropbox\\Options\\Builder\\UploadOptions", "doc": "&quot;Additional options for the Upload operation&quot;"},
                    
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Options\\Builder\\UploadSession", "fromLink": "Alorel/Dropbox/Options/Builder/UploadSession.html", "link": "Alorel/Dropbox/Options/Builder/UploadSession/UploadSessionActiveOptions.html", "name": "Alorel\\Dropbox\\Options\\Builder\\UploadSession\\UploadSessionActiveOptions", "doc": "&quot;Additional options for upload_session\/start&quot;"},
                    
            {"type": "Trait", "fromName": "Alorel\\Dropbox\\Options\\Mixins", "fromLink": "Alorel/Dropbox/Options/Mixins.html", "link": "Alorel/Dropbox/Options/Mixins/AutoRenameTrait.html", "name": "Alorel\\Dropbox\\Options\\Mixins\\AutoRenameTrait", "doc": "&quot;If there&#039;s a conflict, as determined by mode, have the Dropbox server try to autorename the file to avoid\nconflict. The default for this field is False.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Options\\Mixins\\AutoRenameTrait", "fromLink": "Alorel/Dropbox/Options/Mixins/AutoRenameTrait.html", "link": "Alorel/Dropbox/Options/Mixins/AutoRenameTrait.html#method_setAutoRename", "name": "Alorel\\Dropbox\\Options\\Mixins\\AutoRenameTrait::setAutoRename", "doc": "&quot;If there&#039;s a conflict, as determined by mode, have the Dropbox server try to autorename the file to avoid\nconflict. The default for this field is False.&quot;"},
            
            {"type": "Trait", "fromName": "Alorel\\Dropbox\\Options\\Mixins", "fromLink": "Alorel/Dropbox/Options/Mixins.html", "link": "Alorel/Dropbox/Options/Mixins/ClientModifiedTrait.html", "name": "Alorel\\Dropbox\\Options\\Mixins\\ClientModifiedTrait", "doc": "&quot;The value to store as the client_modified timestamp. Dropbox automatically records the time at which the file\nwas written to the Dropbox servers. It can also record an additional timestamp, provided by Dropbox desktop\nclients, mobile clients, and API apps of when the file was actually created or modified&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Options\\Mixins\\ClientModifiedTrait", "fromLink": "Alorel/Dropbox/Options/Mixins/ClientModifiedTrait.html", "link": "Alorel/Dropbox/Options/Mixins/ClientModifiedTrait.html#method_setClientModified", "name": "Alorel\\Dropbox\\Options\\Mixins\\ClientModifiedTrait::setClientModified", "doc": "&quot;The value to store as the client_modified timestamp. Dropbox automatically records the time at which the\nfile was written to the Dropbox servers. It can also record an additional timestamp, provided by Dropbox\ndesktop clients, mobile clients, and API apps of when the file was actually created or modified.&quot;"},
            
            {"type": "Trait", "fromName": "Alorel\\Dropbox\\Options\\Mixins", "fromLink": "Alorel/Dropbox/Options/Mixins.html", "link": "Alorel/Dropbox/Options/Mixins/CloseTrait.html", "name": "Alorel\\Dropbox\\Options\\Mixins\\CloseTrait", "doc": "&quot;If true, current session will be closed. You cannot do upload_session\/append any more to current session The\ndefault for this field is False.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Options\\Mixins\\CloseTrait", "fromLink": "Alorel/Dropbox/Options/Mixins/CloseTrait.html", "link": "Alorel/Dropbox/Options/Mixins/CloseTrait.html#method_setClose", "name": "Alorel\\Dropbox\\Options\\Mixins\\CloseTrait::setClose", "doc": "&quot;If true, current session will be closed. You cannot do upload_session\/append any more to current session The\ndefault for this field is False.&quot;"},
            
            {"type": "Trait", "fromName": "Alorel\\Dropbox\\Options\\Mixins", "fromLink": "Alorel/Dropbox/Options/Mixins.html", "link": "Alorel/Dropbox/Options/Mixins/IncludeDeletedTrait.html", "name": "Alorel\\Dropbox\\Options\\Mixins\\IncludeDeletedTrait", "doc": "&quot;If true, DeletedMetadata will be returned for deleted file or folder, otherwise LookupError.not_found will be\nreturned. The default for this field is False.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Options\\Mixins\\IncludeDeletedTrait", "fromLink": "Alorel/Dropbox/Options/Mixins/IncludeDeletedTrait.html", "link": "Alorel/Dropbox/Options/Mixins/IncludeDeletedTrait.html#method_setIncludeDeleted", "name": "Alorel\\Dropbox\\Options\\Mixins\\IncludeDeletedTrait::setIncludeDeleted", "doc": "&quot;If true, DeletedMetadata will be returned for deleted file or folder, otherwise LookupError.not_found will\nbe returned. The default for this field is False.&quot;"},
            
            {"type": "Trait", "fromName": "Alorel\\Dropbox\\Options\\Mixins", "fromLink": "Alorel/Dropbox/Options/Mixins.html", "link": "Alorel/Dropbox/Options/Mixins/IncludeHasExplicitSharedMembersTrait.html", "name": "Alorel\\Dropbox\\Options\\Mixins\\IncludeHasExplicitSharedMembersTrait", "doc": "&quot;If true, the results will include a flag for each file indicating whether or not that file has any explicit\nmembers. The default for this field is False.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Options\\Mixins\\IncludeHasExplicitSharedMembersTrait", "fromLink": "Alorel/Dropbox/Options/Mixins/IncludeHasExplicitSharedMembersTrait.html", "link": "Alorel/Dropbox/Options/Mixins/IncludeHasExplicitSharedMembersTrait.html#method_setIncludeHasExplicitSharedMembers", "name": "Alorel\\Dropbox\\Options\\Mixins\\IncludeHasExplicitSharedMembersTrait::setIncludeHasExplicitSharedMembers", "doc": "&quot;If true, the results will include a flag for each file indicating whether or not that file has any explicit\nmembers. The default for this field is False.&quot;"},
            
            {"type": "Trait", "fromName": "Alorel\\Dropbox\\Options\\Mixins", "fromLink": "Alorel/Dropbox/Options/Mixins.html", "link": "Alorel/Dropbox/Options/Mixins/IncludeMediaInfoTrait.html", "name": "Alorel\\Dropbox\\Options\\Mixins\\IncludeMediaInfoTrait", "doc": "&quot;If true, FileMetadata.media_info is set for photo and video. The default for this field is False.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Options\\Mixins\\IncludeMediaInfoTrait", "fromLink": "Alorel/Dropbox/Options/Mixins/IncludeMediaInfoTrait.html", "link": "Alorel/Dropbox/Options/Mixins/IncludeMediaInfoTrait.html#method_setIncludeMediaInfo", "name": "Alorel\\Dropbox\\Options\\Mixins\\IncludeMediaInfoTrait::setIncludeMediaInfo", "doc": "&quot;If true, FileMetadata.media_info is set for photo and video. The default for this field is False.&quot;"},
            
            {"type": "Trait", "fromName": "Alorel\\Dropbox\\Options\\Mixins", "fromLink": "Alorel/Dropbox/Options/Mixins.html", "link": "Alorel/Dropbox/Options/Mixins/LimitTrait.html", "name": "Alorel\\Dropbox\\Options\\Mixins\\LimitTrait", "doc": "&quot;The maximum number of entries returned. The default for this field is 10.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Options\\Mixins\\LimitTrait", "fromLink": "Alorel/Dropbox/Options/Mixins/LimitTrait.html", "link": "Alorel/Dropbox/Options/Mixins/LimitTrait.html#method_setLimit", "name": "Alorel\\Dropbox\\Options\\Mixins\\LimitTrait::setLimit", "doc": "&quot;The maximum number of entries returned. The default for this field is 10.&quot;"},
            
            {"type": "Trait", "fromName": "Alorel\\Dropbox\\Options\\Mixins", "fromLink": "Alorel/Dropbox/Options/Mixins.html", "link": "Alorel/Dropbox/Options/Mixins/MaxResultsTrait.html", "name": "Alorel\\Dropbox\\Options\\Mixins\\MaxResultsTrait", "doc": "&quot;The maximum number of search results to return. The default for this field is 100.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Options\\Mixins\\MaxResultsTrait", "fromLink": "Alorel/Dropbox/Options/Mixins/MaxResultsTrait.html", "link": "Alorel/Dropbox/Options/Mixins/MaxResultsTrait.html#method_setMaxResults", "name": "Alorel\\Dropbox\\Options\\Mixins\\MaxResultsTrait::setMaxResults", "doc": "&quot;The maximum number of search results to return. The default for this field is 100.&quot;"},
            
            {"type": "Trait", "fromName": "Alorel\\Dropbox\\Options\\Mixins", "fromLink": "Alorel/Dropbox/Options/Mixins.html", "link": "Alorel/Dropbox/Options/Mixins/MuteTrait.html", "name": "Alorel\\Dropbox\\Options\\Mixins\\MuteTrait", "doc": "&quot;Normally, users are made aware of any file modifications in their Dropbox account via notifications in the\nclient software. If true, this tells the clients that this modification shouldn&#039;t result in a user\nnotification. The default for this field is False.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Options\\Mixins\\MuteTrait", "fromLink": "Alorel/Dropbox/Options/Mixins/MuteTrait.html", "link": "Alorel/Dropbox/Options/Mixins/MuteTrait.html#method_setMute", "name": "Alorel\\Dropbox\\Options\\Mixins\\MuteTrait::setMute", "doc": "&quot;Normally, users are made aware of any file modifications in their Dropbox account via notifications in the\nclient software. If true, this tells the clients that this modification shouldn&#039;t result in a user\nnotification. The default for this field is False.&quot;"},
            
            {"type": "Trait", "fromName": "Alorel\\Dropbox\\Options\\Mixins", "fromLink": "Alorel/Dropbox/Options/Mixins.html", "link": "Alorel/Dropbox/Options/Mixins/RecursiveTrait.html", "name": "Alorel\\Dropbox\\Options\\Mixins\\RecursiveTrait", "doc": "&quot;If true, the operation will apply to all subfolders, too. The default value is false.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Options\\Mixins\\RecursiveTrait", "fromLink": "Alorel/Dropbox/Options/Mixins/RecursiveTrait.html", "link": "Alorel/Dropbox/Options/Mixins/RecursiveTrait.html#method_setRecursive", "name": "Alorel\\Dropbox\\Options\\Mixins\\RecursiveTrait::setRecursive", "doc": "&quot;If true, the operation will apply to all subfolders, too. The default value is false.&quot;"},
            
            {"type": "Trait", "fromName": "Alorel\\Dropbox\\Options\\Mixins", "fromLink": "Alorel/Dropbox/Options/Mixins.html", "link": "Alorel/Dropbox/Options/Mixins/SearchModeTrait.html", "name": "Alorel\\Dropbox\\Options\\Mixins\\SearchModeTrait", "doc": "&quot;The search mode (filename, filename&lt;em&gt;and&lt;\/em&gt;content, or deleted_filename). Note that searching file content is\nonly available for Dropbox Business accounts. The default for this union is filename.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Options\\Mixins\\SearchModeTrait", "fromLink": "Alorel/Dropbox/Options/Mixins/SearchModeTrait.html", "link": "Alorel/Dropbox/Options/Mixins/SearchModeTrait.html#method_setSearchMode", "name": "Alorel\\Dropbox\\Options\\Mixins\\SearchModeTrait::setSearchMode", "doc": "&quot;The search mode (filename, filename&lt;em&gt;and&lt;\/em&gt;content, or deleted_filename). Note that searching file content is\nonly available for Dropbox Business accounts. The default for this union is filename.&quot;"},
            
            {"type": "Trait", "fromName": "Alorel\\Dropbox\\Options\\Mixins", "fromLink": "Alorel/Dropbox/Options/Mixins.html", "link": "Alorel/Dropbox/Options/Mixins/StartTrait.html", "name": "Alorel\\Dropbox\\Options\\Mixins\\StartTrait", "doc": "&quot;The starting index within the search results (used for paging). The default for this field is 0.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Options\\Mixins\\StartTrait", "fromLink": "Alorel/Dropbox/Options/Mixins/StartTrait.html", "link": "Alorel/Dropbox/Options/Mixins/StartTrait.html#method_setStart", "name": "Alorel\\Dropbox\\Options\\Mixins\\StartTrait::setStart", "doc": "&quot;The starting index within the search results (used for paging). The default for this field is 0.&quot;"},
            
            {"type": "Trait", "fromName": "Alorel\\Dropbox\\Options\\Mixins", "fromLink": "Alorel/Dropbox/Options/Mixins.html", "link": "Alorel/Dropbox/Options/Mixins/ThumbnailFormatTrait.html", "name": "Alorel\\Dropbox\\Options\\Mixins\\ThumbnailFormatTrait", "doc": "&quot;The format for the thumbnail image, jpeg (default) or png. For images that are photos, jpeg should be preferred,\nwhile png is better for screenshots and digital arts. The default for this union is jpeg.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Options\\Mixins\\ThumbnailFormatTrait", "fromLink": "Alorel/Dropbox/Options/Mixins/ThumbnailFormatTrait.html", "link": "Alorel/Dropbox/Options/Mixins/ThumbnailFormatTrait.html#method_setThumbnailFormat", "name": "Alorel\\Dropbox\\Options\\Mixins\\ThumbnailFormatTrait::setThumbnailFormat", "doc": "&quot;The format for the thumbnail image, jpeg (default) or png. For images that are photos, jpeg should be preferred,\nwhile png is better for screenshots and digital arts. The default for this union is jpeg.&quot;"},
            
            {"type": "Trait", "fromName": "Alorel\\Dropbox\\Options\\Mixins", "fromLink": "Alorel/Dropbox/Options/Mixins.html", "link": "Alorel/Dropbox/Options/Mixins/ThumbnailSizeTrait.html", "name": "Alorel\\Dropbox\\Options\\Mixins\\ThumbnailSizeTrait", "doc": "&quot;The size for the thumbnail image. The default for this union is w64h64.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Options\\Mixins\\ThumbnailSizeTrait", "fromLink": "Alorel/Dropbox/Options/Mixins/ThumbnailSizeTrait.html", "link": "Alorel/Dropbox/Options/Mixins/ThumbnailSizeTrait.html#method_setThumbnailSize", "name": "Alorel\\Dropbox\\Options\\Mixins\\ThumbnailSizeTrait::setThumbnailSize", "doc": "&quot;The size for the thumbnail image. The default for this union is w64h64.&quot;"},
            
            {"type": "Trait", "fromName": "Alorel\\Dropbox\\Options\\Mixins", "fromLink": "Alorel/Dropbox/Options/Mixins.html", "link": "Alorel/Dropbox/Options/Mixins/TimeoutTrait.html", "name": "Alorel\\Dropbox\\Options\\Mixins\\TimeoutTrait", "doc": "&quot;A timeout in seconds. The request will block for at most this length of time, plus up to 90 seconds of random\njitter added to avoid the thundering herd problem. Care should be taken when using this parameter, as some\nnetwork infrastructure does not support long timeouts. The default for this field is 30.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Options\\Mixins\\TimeoutTrait", "fromLink": "Alorel/Dropbox/Options/Mixins/TimeoutTrait.html", "link": "Alorel/Dropbox/Options/Mixins/TimeoutTrait.html#method_setTimeout", "name": "Alorel\\Dropbox\\Options\\Mixins\\TimeoutTrait::setTimeout", "doc": "&quot;A timeout in seconds. The request will block for at most this length of time, plus up to 90 seconds of random\njitter added to avoid the thundering herd problem. Care should be taken when using this parameter, as some\nnetwork infrastructure does not support long timeouts. The default for this field is 30.&quot;"},
            
            {"type": "Trait", "fromName": "Alorel\\Dropbox\\Options\\Mixins", "fromLink": "Alorel/Dropbox/Options/Mixins.html", "link": "Alorel/Dropbox/Options/Mixins/WriteModeTrait.html", "name": "Alorel\\Dropbox\\Options\\Mixins\\WriteModeTrait", "doc": "&quot;Selects what to do if the file already exists. The default for this union is add.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Options\\Mixins\\WriteModeTrait", "fromLink": "Alorel/Dropbox/Options/Mixins/WriteModeTrait.html", "link": "Alorel/Dropbox/Options/Mixins/WriteModeTrait.html#method_setWriteMode", "name": "Alorel\\Dropbox\\Options\\Mixins\\WriteModeTrait::setWriteMode", "doc": "&quot;Selects what to do if the file already exists. The default for this union is add.&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Options", "fromLink": "Alorel/Dropbox/Options.html", "link": "Alorel/Dropbox/Options/Option.html", "name": "Alorel\\Dropbox\\Options\\Option", "doc": "&quot;Option names&quot;"},
                    
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Options", "fromLink": "Alorel/Dropbox/Options.html", "link": "Alorel/Dropbox/Options/Options.html", "name": "Alorel\\Dropbox\\Options\\Options", "doc": "&quot;Abstract options wrapper&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Options\\Options", "fromLink": "Alorel/Dropbox/Options/Options.html", "link": "Alorel/Dropbox/Options/Options.html#method___construct", "name": "Alorel\\Dropbox\\Options\\Options::__construct", "doc": "&quot;Options constructor.&quot;"},
                    {"type": "Method", "fromName": "Alorel\\Dropbox\\Options\\Options", "fromLink": "Alorel/Dropbox/Options/Options.html", "link": "Alorel/Dropbox/Options/Options.html#method_offsetExists", "name": "Alorel\\Dropbox\\Options\\Options::offsetExists", "doc": "&quot;Whether a offset exists&quot;"},
                    {"type": "Method", "fromName": "Alorel\\Dropbox\\Options\\Options", "fromLink": "Alorel/Dropbox/Options/Options.html", "link": "Alorel/Dropbox/Options/Options.html#method_offsetGet", "name": "Alorel\\Dropbox\\Options\\Options::offsetGet", "doc": "&quot;Offset to retrieve&quot;"},
                    {"type": "Method", "fromName": "Alorel\\Dropbox\\Options\\Options", "fromLink": "Alorel/Dropbox/Options/Options.html", "link": "Alorel/Dropbox/Options/Options.html#method_offsetSet", "name": "Alorel\\Dropbox\\Options\\Options::offsetSet", "doc": "&quot;Offset to set&quot;"},
                    {"type": "Method", "fromName": "Alorel\\Dropbox\\Options\\Options", "fromLink": "Alorel/Dropbox/Options/Options.html", "link": "Alorel/Dropbox/Options/Options.html#method_offsetUnset", "name": "Alorel\\Dropbox\\Options\\Options::offsetUnset", "doc": "&quot;Offset to unset&quot;"},
                    {"type": "Method", "fromName": "Alorel\\Dropbox\\Options\\Options", "fromLink": "Alorel/Dropbox/Options/Options.html", "link": "Alorel/Dropbox/Options/Options.html#method_merge", "name": "Alorel\\Dropbox\\Options\\Options::merge", "doc": "&quot;Create an Options object from a combination of configuration arrays and other option objects&quot;"},
                    {"type": "Method", "fromName": "Alorel\\Dropbox\\Options\\Options", "fromLink": "Alorel/Dropbox/Options/Options.html", "link": "Alorel/Dropbox/Options/Options.html#method_toArray", "name": "Alorel\\Dropbox\\Options\\Options::toArray", "doc": "&quot;Return the generated options&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Parameters", "fromLink": "Alorel/Dropbox/Parameters.html", "link": "Alorel/Dropbox/Parameters/AbstractParameter.html", "name": "Alorel\\Dropbox\\Parameters\\AbstractParameter", "doc": "&quot;Topmost abstract parameter class&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Parameters\\AbstractParameter", "fromLink": "Alorel/Dropbox/Parameters/AbstractParameter.html", "link": "Alorel/Dropbox/Parameters/AbstractParameter.html#method_jsonSerialize", "name": "Alorel\\Dropbox\\Parameters\\AbstractParameter::jsonSerialize", "doc": "&quot;Specify data which should be serialized to JSON&quot;"},
                    {"type": "Method", "fromName": "Alorel\\Dropbox\\Parameters\\AbstractParameter", "fromLink": "Alorel/Dropbox/Parameters/AbstractParameter.html", "link": "Alorel/Dropbox/Parameters/AbstractParameter.html#method___toString", "name": "Alorel\\Dropbox\\Parameters\\AbstractParameter::__toString", "doc": "&quot;A shorthand for JSON-encoding parameters&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Parameters", "fromLink": "Alorel/Dropbox/Parameters.html", "link": "Alorel/Dropbox/Parameters/CommitInfo.html", "name": "Alorel\\Dropbox\\Parameters\\CommitInfo", "doc": "&quot;Contains the path and other optional modifiers for the commit.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Parameters\\CommitInfo", "fromLink": "Alorel/Dropbox/Parameters/CommitInfo.html", "link": "Alorel/Dropbox/Parameters/CommitInfo.html#method___construct", "name": "Alorel\\Dropbox\\Parameters\\CommitInfo::__construct", "doc": "&quot;CommitInfo constructor.&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Parameters", "fromLink": "Alorel/Dropbox/Parameters.html", "link": "Alorel/Dropbox/Parameters/SearchMode.html", "name": "Alorel\\Dropbox\\Parameters\\SearchMode", "doc": "&quot;What we&#039;re searching for&lt;br\/&gt;&lt;br\/&gt;\nNote: Recent changes may not immediately be reflected in search results due to a short delay in indexing.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Parameters\\SearchMode", "fromLink": "Alorel/Dropbox/Parameters/SearchMode.html", "link": "Alorel/Dropbox/Parameters/SearchMode.html#method_filename", "name": "Alorel\\Dropbox\\Parameters\\SearchMode::filename", "doc": "&quot;Search file and folder names.&quot;"},
                    {"type": "Method", "fromName": "Alorel\\Dropbox\\Parameters\\SearchMode", "fromLink": "Alorel/Dropbox/Parameters/SearchMode.html", "link": "Alorel/Dropbox/Parameters/SearchMode.html#method_filenameAndContent", "name": "Alorel\\Dropbox\\Parameters\\SearchMode::filenameAndContent", "doc": "&quot;Search file and folder names as well as file contents.&quot;"},
                    {"type": "Method", "fromName": "Alorel\\Dropbox\\Parameters\\SearchMode", "fromLink": "Alorel/Dropbox/Parameters/SearchMode.html", "link": "Alorel/Dropbox/Parameters/SearchMode.html#method_deletedFilename", "name": "Alorel\\Dropbox\\Parameters\\SearchMode::deletedFilename", "doc": "&quot;Search for deleted file and folder names.&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Parameters", "fromLink": "Alorel/Dropbox/Parameters.html", "link": "Alorel/Dropbox/Parameters/ThumbnailFormat.html", "name": "Alorel\\Dropbox\\Parameters\\ThumbnailFormat", "doc": "&quot;The format for the thumbnail image, jpeg (default) or png. For images that are photos, jpeg should be\npreferred, while png is better for screenshots and digital arts. The default for this union is jpeg.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Parameters\\ThumbnailFormat", "fromLink": "Alorel/Dropbox/Parameters/ThumbnailFormat.html", "link": "Alorel/Dropbox/Parameters/ThumbnailFormat.html#method_jpeg", "name": "Alorel\\Dropbox\\Parameters\\ThumbnailFormat::jpeg", "doc": "&quot;Set the image format to JPEG&quot;"},
                    {"type": "Method", "fromName": "Alorel\\Dropbox\\Parameters\\ThumbnailFormat", "fromLink": "Alorel/Dropbox/Parameters/ThumbnailFormat.html", "link": "Alorel/Dropbox/Parameters/ThumbnailFormat.html#method_png", "name": "Alorel\\Dropbox\\Parameters\\ThumbnailFormat::png", "doc": "&quot;Set the image format to PNG&quot;"},
                    {"type": "Method", "fromName": "Alorel\\Dropbox\\Parameters\\ThumbnailFormat", "fromLink": "Alorel/Dropbox/Parameters/ThumbnailFormat.html", "link": "Alorel/Dropbox/Parameters/ThumbnailFormat.html#method_availableFormats", "name": "Alorel\\Dropbox\\Parameters\\ThumbnailFormat::availableFormats", "doc": "&quot;Return the available formats&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Parameters", "fromLink": "Alorel/Dropbox/Parameters.html", "link": "Alorel/Dropbox/Parameters/ThumbnailSize.html", "name": "Alorel\\Dropbox\\Parameters\\ThumbnailSize", "doc": "&quot;The size for the thumbnail image. The default for this union is 64x64.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Parameters\\ThumbnailSize", "fromLink": "Alorel/Dropbox/Parameters/ThumbnailSize.html", "link": "Alorel/Dropbox/Parameters/ThumbnailSize.html#method___construct", "name": "Alorel\\Dropbox\\Parameters\\ThumbnailSize::__construct", "doc": "&quot;ThumbnailSize constructor.&quot;"},
                    {"type": "Method", "fromName": "Alorel\\Dropbox\\Parameters\\ThumbnailSize", "fromLink": "Alorel/Dropbox/Parameters/ThumbnailSize.html", "link": "Alorel/Dropbox/Parameters/ThumbnailSize.html#method_w32h32", "name": "Alorel\\Dropbox\\Parameters\\ThumbnailSize::w32h32", "doc": "&quot;Make the size 32 pixels wide, 32 pixels height&quot;"},
                    {"type": "Method", "fromName": "Alorel\\Dropbox\\Parameters\\ThumbnailSize", "fromLink": "Alorel/Dropbox/Parameters/ThumbnailSize.html", "link": "Alorel/Dropbox/Parameters/ThumbnailSize.html#method_w64h64", "name": "Alorel\\Dropbox\\Parameters\\ThumbnailSize::w64h64", "doc": "&quot;Make the size 64 pixels wide, 64 pixels high&quot;"},
                    {"type": "Method", "fromName": "Alorel\\Dropbox\\Parameters\\ThumbnailSize", "fromLink": "Alorel/Dropbox/Parameters/ThumbnailSize.html", "link": "Alorel/Dropbox/Parameters/ThumbnailSize.html#method_w128h128", "name": "Alorel\\Dropbox\\Parameters\\ThumbnailSize::w128h128", "doc": "&quot;Make the size 128 pixels wide, 128 pixels high&quot;"},
                    {"type": "Method", "fromName": "Alorel\\Dropbox\\Parameters\\ThumbnailSize", "fromLink": "Alorel/Dropbox/Parameters/ThumbnailSize.html", "link": "Alorel/Dropbox/Parameters/ThumbnailSize.html#method_w640h480", "name": "Alorel\\Dropbox\\Parameters\\ThumbnailSize::w640h480", "doc": "&quot;Make the size 640 pixels wide, 480 pixels high&quot;"},
                    {"type": "Method", "fromName": "Alorel\\Dropbox\\Parameters\\ThumbnailSize", "fromLink": "Alorel/Dropbox/Parameters/ThumbnailSize.html", "link": "Alorel/Dropbox/Parameters/ThumbnailSize.html#method_w1024h768", "name": "Alorel\\Dropbox\\Parameters\\ThumbnailSize::w1024h768", "doc": "&quot;Make the size 1024 pixels wide, 768 pixels high&quot;"},
                    {"type": "Method", "fromName": "Alorel\\Dropbox\\Parameters\\ThumbnailSize", "fromLink": "Alorel/Dropbox/Parameters/ThumbnailSize.html", "link": "Alorel/Dropbox/Parameters/ThumbnailSize.html#method_availableSizes", "name": "Alorel\\Dropbox\\Parameters\\ThumbnailSize::availableSizes", "doc": "&quot;Return a list ov available thumbnail sizes&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Parameters", "fromLink": "Alorel/Dropbox/Parameters.html", "link": "Alorel/Dropbox/Parameters/UploadSessionCursor.html", "name": "Alorel\\Dropbox\\Parameters\\UploadSessionCursor", "doc": "&quot;Contains the upload session ID and the offset.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Parameters\\UploadSessionCursor", "fromLink": "Alorel/Dropbox/Parameters/UploadSessionCursor.html", "link": "Alorel/Dropbox/Parameters/UploadSessionCursor.html#method___construct", "name": "Alorel\\Dropbox\\Parameters\\UploadSessionCursor::__construct", "doc": "&quot;UploadSessionCursor constructor.&quot;"},
                    {"type": "Method", "fromName": "Alorel\\Dropbox\\Parameters\\UploadSessionCursor", "fromLink": "Alorel/Dropbox/Parameters/UploadSessionCursor.html", "link": "Alorel/Dropbox/Parameters/UploadSessionCursor.html#method_setOffset", "name": "Alorel\\Dropbox\\Parameters\\UploadSessionCursor::setOffset", "doc": "&quot;Sets the cursor offset&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Parameters", "fromLink": "Alorel/Dropbox/Parameters.html", "link": "Alorel/Dropbox/Parameters/WriteMode.html", "name": "Alorel\\Dropbox\\Parameters\\WriteMode", "doc": "&quot;Selects what to do if the file already exists. The default for this union is add.&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Parameters\\WriteMode", "fromLink": "Alorel/Dropbox/Parameters/WriteMode.html", "link": "Alorel/Dropbox/Parameters/WriteMode.html#method_add", "name": "Alorel\\Dropbox\\Parameters\\WriteMode::add", "doc": "&quot;Never overwrite the existing file. The autorename strategy is to append a number to the file name. For\nexample, \&quot;document.txt\&quot; might become \&quot;document (2).txt\&quot;.&quot;"},
                    {"type": "Method", "fromName": "Alorel\\Dropbox\\Parameters\\WriteMode", "fromLink": "Alorel/Dropbox/Parameters/WriteMode.html", "link": "Alorel/Dropbox/Parameters/WriteMode.html#method_overwrite", "name": "Alorel\\Dropbox\\Parameters\\WriteMode::overwrite", "doc": "&quot;Always overwrite the existing file. The autorename strategy is the same as it is for add.&quot;"},
                    {"type": "Method", "fromName": "Alorel\\Dropbox\\Parameters\\WriteMode", "fromLink": "Alorel/Dropbox/Parameters/WriteMode.html", "link": "Alorel/Dropbox/Parameters/WriteMode.html#method_update", "name": "Alorel\\Dropbox\\Parameters\\WriteMode::update", "doc": "&quot;Overwrite if the given \&quot;rev\&quot; matches the existing file&#039;s \&quot;rev\&quot;. The autorename strategy is to append the\nstring \&quot;conflicted copy\&quot; to the file name. For example, \&quot;document.txt\&quot; might become \&quot;document (conflicted\ncopy).txt\&quot; or \&quot;document (Panda&#039;s conflicted copy).txt\&quot;.&quot;"},
            
            {"type": "Class", "fromName": "Alorel\\Dropbox\\Response", "fromLink": "Alorel/Dropbox/Response.html", "link": "Alorel/Dropbox/Response/ResponseAttribute.html", "name": "Alorel\\Dropbox\\Response\\ResponseAttribute", "doc": "&quot;Response attributes&quot;"},
                    
            {"type": "Class", "fromName": "Alorel\\Dropbox", "fromLink": "Alorel/Dropbox.html", "link": "Alorel/Dropbox/Util.html", "name": "Alorel\\Dropbox\\Util", "doc": "&quot;Miscellaneous utilities&quot;"},
                                                        {"type": "Method", "fromName": "Alorel\\Dropbox\\Util", "fromLink": "Alorel/Dropbox/Util.html", "link": "Alorel/Dropbox/Util.html#method_trimNulls", "name": "Alorel\\Dropbox\\Util::trimNulls", "doc": "&quot;Trims nulls from the input&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    }
    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


