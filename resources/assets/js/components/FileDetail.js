import React, { Component } from "react"
import swal from "sweetalert2"
import axios from "axios"

export default class FileDetail extends Component {
	constructor(props) {
		super(props)

		this.state = {
			editMode: false,
			fileName: this.props.fileName
		}

		this.handleNameChanged = this.handleNameChanged.bind(this)
		this.handleEditModeToggled = this.handleEditModeToggled.bind(this)
		this.handleFileDeleted = this.handleFileDeleted.bind(this)
	}

	render() {
		const { fileId, fileSizeMB, fileDownloadCount } = this.props
		const { editMode, fileName } = this.state

		return (
			<div className="row">
				<div className="col col-md-9">
					<div className="card">
						<div className="card-header">
							Mis archivos: {fileName}
						</div>
						<div className="card-body">
							<ul>
								<li>
									<b>Nombre</b>:
									&nbsp;
									{
										editMode
											? <input
												className="form-control"
												type="text"
												value={fileName}
												onChange={this.handleNameChanged}
											/>
											: <span>{fileName}</span>
									}
								</li>
								<li>
									<b>Tamaño</b>: {fileSizeMB} MB
								</li>
								<li>
									<b>Descargas</b>: {fileDownloadCount}
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div className="col col-md-3">
					<div className="card">
						<div className="card-header">
							Acciones
						</div>
						<div className="card-body">
							<div className="btn-group-vertical">
								<a
									className={`btn btn-primary ${editMode ? "btn-success" : ""}`}
									href="#"
									onClick={this.handleEditModeToggled}
								>
									{
										editMode
											? "Guardar cambios"
											: "Editar"
									}
								</a>
								<a
									className="btn btn-outline-primary"
									href={`/files/${fileId}/download`}
								>
									Descargar
								</a>
								<a
									className="btn btn-outline-primary"
									href={`/files/${fileId}/owners`}
								>
									Propietarios
								</a>
								<a
									className="btn btn-outline-danger"
									href="#"
									onClick={this.handleFileDeleted}
								>
									Eliminar
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		)
	}

	handleNameChanged(event) {
		this.setState({ fileName: event.target.value })
	}

	async handleEditModeToggled() {
		const {editMode, fileName} = this.state

		if (editMode) {
			await axios({
				method: "put",
				url: `/files/${this.props.fileId}`,
				data: {
					name: fileName
				},
			})
		}

		this.setState({ editMode: !editMode })
	}

	async handleFileDeleted() {
		const result = await swal({
			title: "¿Estás seguro?",
			text: "¡Se va a borrar este archivo permanentemente!",
			type: "warning",
			showCancelButton: true,
			confirmButtonText: "Sí, borrar",
			cancelButtonText: "No, conservar",
			confirmButtonColor: '#d33'
		})

		if (result.value) {
			await axios.delete(`/files/${this.props.fileId}`)
			window.location = "/files"
		}
	}
}

