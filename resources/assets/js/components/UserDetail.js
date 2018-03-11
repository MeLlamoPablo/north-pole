import React, { Component } from "react"
import swal from "sweetalert2"
import axios from "axios"

export default class UserDetail extends Component {
	constructor(props) {
		super(props)

		this.state = {
			editMode: false,
			userEmail: this.props.userEmail,
			userFirstName: this.props.userFirstName,
			userLastName: this.props.userLastName,
			userWebsite: this.props.userWebsite,
			userAbout: this.props.userAbout
		}

		this.handleValueChanged = this.handleValueChanged.bind(this)
		this.handleEditModeToggled = this.handleEditModeToggled.bind(this)
	}

	render() {
		return (
			<div className="row">
				<div className="col col-md-9">
					<div className="card">
						<div className="card-header">
							Perfil de {this.state.userName}
						</div>
						<UserProfile
							avatar={this.props.userAvatar}
							editMode={this.state.editMode}
							username={this.props.userName}
							email={this.state.userEmail}
							firstName={this.state.userFirstName}
							lastName={this.state.userLastName}
							website={this.state.userWebsite}
							about={this.state.userAbout}
							onValueChange={this.handleValueChanged}
						/>
					</div>
				</div>
				<div className="col col-md-3">
					<div className="card">
						<div className="card-header">
							Acciones
						</div>
						<div className="card-body">
							{
								this.props.isOwnUser
									? <a
										className={`btn btn-primary ${
											this.state.editMode ? "btn-success" : ""}`}
										href="#"
										onClick={this.handleEditModeToggled}
									>
										{
											this.state.editMode
												? "Guardar cambios"
												: "Editar"
										}
									</a>

									: <p>Nada que hacer</p>
							}
						</div>
					</div>
				</div>
			</div>
		)
	}

	handleValueChanged(key, value) {
		const state = { ...this.state }
		state[key] = value
		this.setState(state)
	}

	async handleEditModeToggled() {
		const {
			editMode,
			userEmail,
			userFirstName,
			userLastName,
			userWebsite,
			userAbout
		} = this.state

		const error = msg => swal({
			type: "error",
			title: "Datos inválidos",
			text: msg
		})

		if (editMode) {
			if (!userEmail) {
				await error("Por favor, introduce un email")
				return
			}

			if (!userEmail.match(/.+@.+/)) {
				await error("El email no es válido")
				return
			}

			if (userWebsite && userWebsite.substr(0, 4) !== "http") {
				await error("La página web tiene que empezar por http o https.")
				return
			}

			await axios({
				method: "put",
				url: `/users/${this.props.userName}`,
				data: {
					email: userEmail,
					name: userFirstName,
					lastName: userLastName,
					website: userWebsite,
					about: userAbout
				}
			})
		}

		this.setState({ editMode: !editMode })
	}
}

function UserProfile(props) {
	const {
		editMode,
		avatar,
		username,
		email,
		firstName,
		lastName,
		website,
		about,
		onValueChange
	} = props

	return <div className="card-body">
		<div className="media">
			<img className="img-fluid" src={`${avatar}`}/>
			<div className="media-body">
				<ul>
					<li>
						<b>Email</b>:
						&nbsp;
						{
							editMode

								? <input
									className="form-control"
									type="text"
									value={email}
									onChange={e =>
										onValueChange("userEmail", e.target.value)}
								/>

								: <span>{email}</span>
						}
					</li>
					{
						editMode

							? <div>
								<li>
									<b>Nombre</b>:
									&nbsp;
									<input
										className="form-control"
										type="text"
										value={firstName}
										onChange={e =>
											onValueChange("userFirstName", e.target.value)}
									/>
								</li>
								<li>
									<b>Apellidos</b>:
									&nbsp;
									<input
										className="form-control"
										type="text"
										value={lastName}
										onChange={e =>
											onValueChange("userLastName", e.target.value)}
									/>
								</li>
							</div>

							: firstName && lastName &&

							<li>
								<b>Nombre</b>:
								&nbsp;
								{firstName}
								&nbsp;
								{lastName}
							</li>
					}
					{(website || editMode) &&

					<li>
						<b>Página web</b>:
						&nbsp;
						{
							editMode

								? <input
									className="form-control"
									type="text"
									value={website}
									onChange={e =>
										onValueChange("userWebsite", e.target.value)}
								/>

								: <a
									href={website}
									target="_blank"
									rel="noopener"
								>
									{website}
								</a>

						}
					</li>

					}
					{(about || editMode) &&

					<li>
						<b>Acerca de {username || firstName}</b>:
						&nbsp;
						{
							editMode

								? <input
									className="form-control"
									type="text"
									value={about}
									onChange={e =>
										onValueChange("userAbout", e.target.value)}
								/>

								: <span>{about}</span>

						}
					</li>

					}
				</ul>

				{editMode &&

				<p>Para modificar tu avatar, asocia un avatar a tu dirección de
				correo en <a href="https://es.gravatar.com/" target="_blank" rel="noopener">Gravatar</a>.</p>

				}
			</div>
		</div>
	</div>
}