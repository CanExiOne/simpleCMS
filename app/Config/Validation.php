<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $createUser = [
		'userFirstName' => [
			'rules' => 'required|alpha_numeric_space|min_length[3]|max_length[60]',
			'errors' => [
				'required' => 'Nie podano imienia użytkownika!',
				'alpha_numeric_space' => 'Imię zawiera niedozwolone znaki!',
				'min_length' => 'Imię musi się składać z conajmniej 3 znaków!',
				'max_length' => 'Imię nie może składać się z więcej niż 60 znaków!'
			]
		],
		'userLastName' => [
			'rules' => 'required|alpha_numeric_space|min_length[3]|max_length[60]',
			'errors' => [
				'required' => 'Nie podano nazwiska użytkownika!',
				'alpha_numeric_space' => 'Nazwisko zawiera niedozwolone znaki!',
				'min_length' => 'Nazwisko musi się składać z conajmniej 3 znaków!',
				'max_length' => 'Nazwisko nie może się składać z więcej niż 60 znaków'
			]
		],
		'userEmail' => [
			'rules' => 'valid_email|is_unique[users.email]',
			'errors' => [
				'valid_email' => 'Podano niepoprawny adres e-mail!',
				'is_unique' => 'Podany adres e-mail jest już używany przez inne konto!',
			]
		],
		'userGroup' => [
			'rules' => 'required|in_list[1,2,3]',
			'errors' => [
				'required' => 'Musisz wybrać grupę!',
				'in_list' => 'Musisz wybrać grupę!'
			]
		],
	];

	public $updateUser = [
		'userFirstName' => [
			'rules' => 'required|alpha_numeric_space|min_length[3]|max_length[60]',
			'errors' => [
				'required' => 'Nie podano imienia użytkownika!',
				'alpha_numeric_space' => 'Imię zawiera niedozwolone znaki!',
				'min_length' => 'Imię musi się składać z conajmniej 3 znaków!',
				'max_length' => 'Imię nie może składać się z więcej niż 60 znaków!'
			]
		],
		'userLastName' => [
			'rules' => 'required|alpha_numeric_space|min_length[3]|max_length[60]',
			'errors' => [
				'required' => 'Nie podano nazwiska użytkownika!',
				'alpha_numeric_space' => 'Nazwisko zawiera niedozwolone znaki!',
				'min_length' => 'Nazwisko musi się składać z conajmniej 3 znaków!',
				'max_length' => 'Nazwisko nie może się składać z więcej niż 60 znaków'
			]
		],
		'userEmail' => [
			'rules' => 'valid_email|is_unique[users.email,id,{userId}]',
			'errors' => [
				'valid_email' => 'Podano niepoprawny adres e-mail!',
				'is_unique' => 'Podany adres e-mail jest już używany przez inne konto!',
			]
		],
		'userGroup' => [
			'rules' => 'required|in_list[1,2,3]',
			'errors' => [
				'required' => 'Musisz wybrać grupę!',
				'in_list' => 'Musisz wybrać grupę!'
			]
		],
	];

	public $deleteUser = [
		'confirmPassword' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Musisz potwierdzić swoje hasło!'
			],
		],
	];

	public $updateSettings = [
		'siteName' => [
			'rules' => 'required|max_length[80]',
			'errors' => [
				'required' => 'Musisz podać nazwę strony!',
				'max_length' => 'Nazwa strony nie może być dłuższa niż 80 znaków!',
			]
		],
		'siteLogo' => [
			'rules' => 'mime_in[siteLogo,image/jpeg,image/jpg,image/png]|max_size[siteLogo,2072]|max_dims[siteLogo,2000,2000]|permit_empty',
			'errors' => [
				'mime_in' => 'Logo musi być plikiem w formacie PNG!',
				'max_size' => 'Logo nie może być większe niż 2MB!',
				'max_dims' => 'Logo nie może mieć większych rozmiarów niż 2000x2000!'
			],
		],
		'statsClients' => [
			'rules' => 'alpha_numeric',
			'errors' => [
				'required' => 'To pole jest wymagane!',
				'alpha_numeric' => 'Musisz podać liczbę!',
			],
		],
		'statsFinishedProjects' => [
			'rules' => 'alpha_numeric',
			'errors' => [
				'required' => 'To pole jest wymagane!',
				'alpha_numeric' => 'Musisz podać liczbę!',
			],
		],
		'statsCurrentProjects' => [
			'rules' => 'alpha_numeric',
			'errors' => [
				'required' => 'To pole jest wymagane!',
				'alpha_numeric' => 'Musisz podać liczbę!',
			],
		],
		'statsEmployees' => [
			'rules' => 'alpha_numeric',
			'errors' => [
				'required' => 'To pole jest wymagane!',
				'alpha_numeric' => 'Musisz podać liczbę!',
			],
		],
	];

	public $updateEmail = [
		'emailSender' => [
			'rules' => 'valid_email',
			'errors' => [
				'valid_email' => 'W tym polu musisz podać poprawny e-mail'
			]
		]
	];

	public $uploadFile = [
		'myImage' => [
			'rules' => 'mime_in[myImage,image/jpeg,image/jpg,image/png]|max_size[myImage,2000]|max_dims[myImage,2444,2444]',
			'errors' => [
				'max_size' => 'max_size',
				'max_dims' => 'max_dims',
				'mime_in' => 'mime_in'
			],
		],
	];

	public $createNews = [
		'title' => [
			'rules' => 'required|min_length[5]|max_length[196]|is_unique[news.title]',
			'errors' => [
				'required' => 'Musisz podać tytuł dla ogłoszenia!',
				'min_length' => 'Tytuł musi się składać z conajmniej 5 znaków',
				'max_length' => 'Tytuł nie może być dłuższy niż 196 znaków',
				'is_unique' => 'Post z takim tytułem już istnieje'
			]
		],
		'contents' => [
			'rules' => 'required|min_length[50]',
			'errors' => [
				'required' => 'Ogłoszenie nie może być puste!',
				'min_length' => 'Ogłoszenie musi się składać z conajmniej 50 znaków!',
			]
		],
	];

	public $editNews = [
		'title' => [
			'rules' => 'required|min_length[5]|max_length[196]|is_unique[news.title,id,{postId}]',
			'errors' => [
				'required' => 'Musisz podać tytuł dla ogłoszenia!',
				'min_length' => 'Tytuł musi się składać z conajmniej 5 znaków',
				'max_length' => 'Tytuł nie może być dłuższy niż 196 znaków',
				'is_unique' => 'Post z takim tytułem już istnieje'
			]
		],
		'contents' => [
			'rules' => 'required|min_length[50]',
			'errors' => [
				'required' => 'Ogłoszenie nie może być puste!',
				'min_length' => 'Ogłoszenie musi się składać z conajmniej 50 znaków!',
			]
		],
	];

	public $deleteNews = [
		'password' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Musisz podać swoje hasło w celu potwierdzenia tej czynności!',
			],
		],
		'password-confirm' => [
			'rules' => 'required|matches[password]',
			'errors' => [
				'required' => 'Musisz potwierdzić swoje hasło!',
				'matches' => 'Hasła się nie zgadzają!',
			],
		],
	];

	public $userLogin = [
		'email' => [
			'rules' => 'required|valid_email',
			'errors' => [
				'required' => 'Musisz podać adres e-mail!',
				'valid_email' => 'Musisz podać poprawny adres e-mail!'
			],
		],
		'password' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Musisz podać hasło!'
			]
		]
	];

	public $contactForm = [
		'name' => [
			'rules' => 'required|min_length[3]|max_length[255]',
			'errors' => [
				'required' => 'Musisz podać swoje imię, aby wysłać wiadomość!',
				'min_length' => 'Pole z imieniem musi zawierać conajmniej 3 znaki!',
				'max_length' => 'Pole z imieniem nie może być dłuższe niż 255 znaków!',
			],
		],
		'email' => [
			'rules' => 'valid_email',
			'errors' => [
				'valid_email' => 'Musisz podać poprawny adres e-mail!'
			],
		],
		'subject' => [
			'rules' => 'required|min_length[5]|max_length[255]',
			'errors' => [
				'required' => 'Musisz podać tytuł wiadomości!',
				'min_length' => 'Tytuł musi zawierać conajmniej 5 znaków!',
				'max_length' => 'Tytuł nie może być dłuższy niż 255 znaków!',
			],
		],
		'message' => [
			'rules' => 'required|min_length[20]|max_length[2000]',
			'errors' => [
				'required' => 'Musisz napisać wiadomość!',
				'min_length' => 'Wiadomość musi składać się z conajmniej 20 znaków!',
				'max_length' => 'Wiadomość nie może być dłuższa niż 2000 znaków!',
			],
		],
	];

	public $createAlbum = [
		'title' => [
			'rules' => 'required|max_length[120]',
			'errors' => [
				'required' => 'Album musi posiadać tytuł!',
				'max_length' => 'Tytuł albumu nie może być dłuższy niż 120 znaków'
			]
		],
		
		'category' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'Musisz wybrać kategorię!',
			]
		],

		'client' => [
			'rules' => 'max_length[80]',
			'errors' => [
				'max_length' => 'Nazwa klienta nie może być dłuższa niż 80 znaków'
			]
		],

		'date' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'To pole jest wymagane!'
			]
		],

		'description' => [
			'rules' => 'max_length[1000]',
			'errors' => [
				'max_length' => 'Maksymalna dozwolona ilość znaków w opisie to 1000!'
			]
		],

		'file' => [
			'rules' => 'uploaded[file]|mime_in[file,image/png,image/jpg,/image/jpeg,image/gif]|max_size[file,4096]|permit_empty',
			'errors' => [
				'uploaded' => 'Wystąpił błąd podczas wysyłania plików, spróbuj ponownie!',
				'mime_in' => 'Wysłany plik posiada nieprawidłowe rozszerzenie! Dozwolone rozszerzenia to PNG, JPG, JPEG oraz GIF',
				'max_size' => 'Wysłany plik jest zbyt duży! Maksymalna wielkość pliku to 4MB!'
			]
		],
	];

	public $changePassword = [
		'newPassword' => [
			'rules' => 'required|min_length[8]|max_length[60]',
			'errors' => [
				'required' => 'To pole jest wymagane!',
				'min_length' => 'Hasło nie może być krótsze niż 8 znaków!',
				'max_length' => 'Hasło nie może być dłuższe niż 60 znaków!'
			],
		],
	];

	public $updateProfile = [
		'firstName' => [
			'rules' => 'required|alpha_numeric_space|min_length[3]|max_length[60]',
			'errors' => [
				'required' => 'Nie podano imienia!',
				'alpha_numeric_space' => 'Imię zawiera niedozwolone znaki!',
				'min_length' => 'Imię musi się składać z conajmniej 3 znaków!',
				'max_length' => 'Imię nie może składać się z więcej niż 60 znaków!'
			]
		],
		'lastName' => [
			'rules' => 'required|alpha_numeric_space|min_length[3]|max_length[60]',
			'errors' => [
				'required' => 'Nie podano nazwiska!',
				'alpha_numeric_space' => 'Nazwisko zawiera niedozwolone znaki!',
				'min_length' => 'Nazwisko musi się składać z conajmniej 3 znaków!',
				'max_length' => 'Nazwisko nie może się składać z więcej niż 60 znaków'
			]
		],
		'email' => [
			'rules' => 'valid_email|is_unique[users.email,id,{userId}]',
			'errors' => [
				'valid_email' => 'Podano niepoprawny adres e-mail!',
				'is_unique' => 'Podany adres e-mail jest już używany przez inne konto!',
			]
		],
	];
}
