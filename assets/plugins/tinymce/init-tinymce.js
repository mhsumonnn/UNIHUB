tinymce.init({
  /* replace textarea having class .tinymce with tinymce editor */
  selector: "textarea.tinymce",
  branding: false,
  
  /* theme of the editor */
  theme: "modern",
  skin: "lightgray",
  //skin: "charcoal",

  /* width and height of the editor */
  width: "100%",
  height: 300,
  
  /* display statusbar */
  statubar: false,
  menubar: false,

  codesample_dialog_width: '500',
  codesample_dialog_height: '400',
  codesample_languages: [
        {text: 'HTML/XML', value: 'markup'},
        {text: 'JavaScript', value: 'javascript'},
        {text: 'CSS', value: 'css'},
        {text: 'PHP', value: 'php'},
        {text: 'Ruby', value: 'ruby'},
        {text: 'Python', value: 'python'},
        {text: 'Java', value: 'java'},
        {text: 'C', value: 'c'},
        {text: 'C#', value: 'csharp'},
        {text: 'C++', value: 'cpp'}
    ],
  
  /* plugin */
  plugins: [
    "advlist autolink link lists charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
    "save table contextmenu directionality emoticons template paste textcolor codesample"
  ],

  /* toolbar */
  toolbar: "insertfile undo redo | code codesample | styleselect | bold italic strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | print preview emoticons | forecolor backcolor",

  /* style */
  style_formats: [
    {title: "Headers", items: [
      {title: "Header 1", format: "h1"},
      {title: "Header 2", format: "h2"},
      {title: "Header 3", format: "h3"},
      {title: "Header 4", format: "h4"},
      {title: "Header 5", format: "h5"},
      {title: "Header 6", format: "h6"}
    ]},
    {title: "Inline", items: [
      {title: "Bold", icon: "bold", format: "bold"},
      {title: "Italic", icon: "italic", format: "italic"},
      {title: "Underline", icon: "underline", format: "underline"},
      {title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
      {title: "Superscript", icon: "superscript", format: "superscript"},
      {title: "Subscript", icon: "subscript", format: "subscript"},
      {title: "Code", icon: "code", format: "code"}
    ]},
    {title: "Blocks", items: [
      {title: "Paragraph", format: "p"},
      {title: "Blockquote", format: "blockquote"},
      {title: "Div", format: "div"},
      {title: "Pre", format: "pre"}
    ]},
    {title: "Alignment", items: [
      {title: "Left", icon: "alignleft", format: "alignleft"},
      {title: "Center", icon: "aligncenter", format: "aligncenter"},
      {title: "Right", icon: "alignright", format: "alignright"},
      {title: "Justify", icon: "alignjustify", format: "alignjustify"}
    ]}
  ]
});