import React from "react"
import ReactDOM from "react-dom"
import FileDetail from "./components/FileDetail"
import UserDetail from "./components/UserDetail"

require('./bootstrap')

const fileDetail = document.getElementById('react-file-detail')
const userDetail = document.getElementById('react-user-detail')

if (fileDetail) {
	ReactDOM.render(
		<FileDetail
			fileId={fileDetail.getAttribute("data-file-id")}
			fileName={fileDetail.getAttribute("data-file-name")}
			fileSizeMB={+fileDetail.getAttribute("data-file-size-mb")}
			fileDownloadCount={+fileDetail.getAttribute("data-file-download-count")}
		/>,
		fileDetail
	)
}

if (userDetail) {
	ReactDOM.render(
		<UserDetail
			isOwnUser={userDetail.getAttribute("data-is-own-user")}
			userAvatar={userDetail.getAttribute("data-user-avatar")}
			userName={userDetail.getAttribute("data-user-name")}
			userEmail={userDetail.getAttribute("data-user-email")}
			userFirstName={userDetail.getAttribute("data-user-first-name")}
			userLastName={userDetail.getAttribute("data-user-last-name")}
			userWebsite={userDetail.getAttribute("data-user-website")}
			userAbout={userDetail.getAttribute("data-user-about")}
		/>,
		userDetail
	)
}
